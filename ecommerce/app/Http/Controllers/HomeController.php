<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Category;

use App\Models\User;

use App\Models\Cart;

use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {

        $category = Category::all();

        $product = Product::orderBy('created_at', 'desc')->take(8)->get();

        $count = '';

        $orderCount = '';

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $orderCount = Order::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count', 'category', 'orderCount'));
    }

    public function all()
    {

        $category = Category::all();

        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $orderCount = Order::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.list', compact('product', 'count', 'category', 'orderCount'));
    }

    public function filterByCategory($category_name)
    {
        $category = Category::all();

        $product = Product::where('category', $category_name)->get();

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $orderCount = Order::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.list', compact('product', 'count', 'category', 'category_name', 'orderCount'));
    }

    public function login_home()
    {
        $category = Category::all();

        $user = Auth::user()->id;

        $product = Product::orderBy('created_at', 'desc')->take(8)->get();

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $orderCount = Order::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count', 'category', 'orderCount'));
    }

    public function product_details($id)
    {
        $category = Category::all();

        $data = Product::find($id);

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $orderCount = Order::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        $productCategory = Product::where('category', $data->category)->where('id', '!=', $id)->get();

        return view('home.product_details', compact('data', 'count', 'category', 'productCategory', 'orderCount'));
    }

    public function add_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        flash()->options([
            'timeout' => 3000,
        ])->success('Added to cart!');

        return redirect()->back();
    }

    public function mycart()
    {
        $category = Category::all();

        $count = '';

        $orderCount = '';

        if (Auth::id()) {
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id', $userid)->count();

            $cart = Cart::where('user_id', $userid)->get();

            $orderCount = Order::where('user_id', $userid)->count();
        }

        return view('home.mycart', compact('count', 'cart', 'category', 'orderCount'));
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;

        $checkedItems = $request->input('items', []);

        foreach ($checkedItems as $itemId) {
            $cartItem = Cart::find($itemId);

            if ($cartItem && $cartItem->user_id == $userid) {
                $order = new Order;
                $order->name = $name;
                $order->rec_address = $address;
                $order->phone = $phone;
                $order->user_id = $userid;
                $order->product_id = $cartItem->product_id;
                $order->save();

                $cartItem->delete();
            }
        }

        flash()->options([
            'timeout' => 3000,
        ])->success('Order Placed!');

        return redirect()->back();
    }

    public function myorders()
    {
        $category = Category::all();

        $user = Auth::user()->id;

        $count = Cart::where('user_id', $user)->count();

        $orderCount = Order::where('user_id', $user)->count();

        $order = Order::where('user_id', $user)->get();

        return view('home.orders', compact('count', 'category', 'order', 'orderCount'));
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);

        if ($order && $order->user_id == Auth::user()->id) {
            $order->status = 'cancelled';
            $order->save();
        }

        flash()->options([
            'timeout' => 3000,
        ])->success('Order Cancelled!');

        return redirect()->back();
    }

    public function deleteCart($id)
    {
        $cart = Cart::find($id);

        if ($cart && $cart->user_id == Auth::user()->id) {
            $cart->delete();
        }

        flash()->options([
            'timeout' => 3000,
        ])->success('Order Deleted!');

        return redirect()->back();
    }
}
