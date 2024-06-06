<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use App\Models\User;

use Barryvdh\DomPDF\Facade\Pdf;

use GuzzleHttp\RedirectMiddleware;
use League\CommonMark\Node\Query\OrExpr;

use function PHPUnit\Framework\fileExists;

class AdminController extends Controller
{

    public function index()
    {
        $dataCategory = Category::all();

        $user = User::all()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        return view('admin.index', compact('dataCategory', 'user', 'product', 'order'));
    }

    public function view_category()
    {
        $data = Category::all();

        $dataCategory = Category::all();

        return view('admin.category', compact('data', 'dataCategory'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        flash()->options([
            'timeout' => 3000,
        ])->success('Category Added Successfully!');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        flash()->options([
            'timeout' => 3000,
        ])->success('Category Deleted Successfully!');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        flash()->options([
            'timeout' => 3000,
        ])->success('Category Updated Successfully!');

        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();

        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->qty;

        $data->category = $request->category;

        // image data
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        flash()->options([
            'timeout' => 3000,
        ])->success('Added Product Successfully!');

        return redirect()->back();
    }

    public function view_product()
    {
        $category = Category::all();

        $dataCategory = Category::all();

        $product = Product::paginate(10);

        return view('admin.view_product', compact('product', 'category', 'dataCategory'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/' . $data->image);

        if (fileExists($image_path)) {
            unlink($image_path);
        }

        $data->delete();

        flash()->options([
            'timeout' => 3000,
        ])->success('Product Deleted Successfully!');

        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        return view('admin.update_product', compact('data', 'category'));
    }

    // new

    public function get_product($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        flash()->options([
            'timeout' => 3000,
        ])->success('Product Updated Successfully!');


        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {

        $category = Category::all();

        $dataCategory = Category::all();

        $search = $request->search;

        $product = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(5);

        return view('admin.view_product', compact('product', 'category', 'dataCategory'));
    }

    public function orders()
    {
        $data = Order::all();

        $dataCategory = Category::all();

        return view('admin.orders', compact('dataCategory', 'data'));
    }

    public function to_ship($id)
    {
        $data = Order::find($id);

        $data->status = 'to ship';

        $data->save();

        return redirect('/orders');
    }

    public function completed($id)
    {
        $data = Order::find($id);

        $data->status = 'completed';

        $data->save();

        return redirect('/orders');
    }

    public function print($id)
    {

        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice', compact('data'));

        return $pdf->download('invoice.pdf');
    }

    public function chat()
    {
        $dataCategory = Category::all();

        return  view('admin.chat', compact('dataCategory'));
    }
}
