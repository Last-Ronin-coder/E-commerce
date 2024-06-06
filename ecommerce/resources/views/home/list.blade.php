<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>
    <!-- header -->
    @include('home.header')

    <main>

        <section class="w-full min-h-auto px-8 lg:px-0 lg:w-5/6 mx-auto my-10 flex gap-8">
            <aside class="sticky top-0 hidden lg:flex flex-col lg:w-1/4 max-h-screen">
                <div class="aside_section overflow-y-auto">
                    <div class="categories w-full rounded-xl p-4 bg-white border shadow-lg">
                        <h1 class="text-xl font-semibold mb-4">CATEGORY</h1>
                        @foreach($category as $cat)
                        <div class="border-b pb-3 text-lg text-gray-600">
                            <div class="flex items-center gap-2">
                                <a class="{{ request()->is('category/' . $cat->category_name) ? 'text-red-500' : 'text-black' }}" href="{{ route('category.filter', $cat->category_name) }}">{{ $cat->category_name }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside>

            <div class="products w-full lg:w-3/4 flex flex-col">
                <div class="newProductsContainer">
                    <h1 class="font-semibold text-xl border-b py-4">
                        @if (request()->is('category/*'))
                        {{ $category_name }}
                        @else
                        All Products
                        @endif
                    </h1>
                    <div id="" class="newProducts grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($product as $product)
                        <div class="product_pic cursor-pointer overflow-hidden flex flex-col gap-2 p-4 w-full h-92 border shadow-md bg-white rounded-lg relative">
                            <div class="z-10 tax absolute top-2 left-2 bg-green-600 text-white text-sm font-bold border rounded-md">
                            </div>
                            <div class="productOptions hidden flex-col gap-2 absolute right-2 top-2 text-xl font-semibold z-10">
                                <div class="w-8 h-8 bg-white rounded-lg rounded-lg shadow-md border flex items-center justify-center cursor-pointer text-gray-700 hover:text-white hover:bg-gray-700">
                                    <a href="{{url('product_details', $product->id)}}"><ion-icon name="eye-outline"></ion-icon></a>
                                </div>
                                <div class="w-8 h-8 bg-white rounded-lg rounded-lg shadow-md border flex items-center justify-center cursor-pointer text-gray-700 hover:text-white hover:bg-gray-700">
                                    <a href="{{url('add_cart', $product->id)}}"><ion-icon name="bag-add-outline"></ion-icon></a>
                                </div>
                            </div>
                            <div class="w-full h-1/2 mb-2" style="background-image: url('/products/{{$product->image}}');">
                                <img class="product_hover_pic w-full h-full" src="/products/{{$product->image}}" alt="" />
                            </div>
                            <h3 class="text-red-500">{!!Str::limit($product->title, 20)!!}</h3>
                            <h5>{{$product->category}}</h5>
                            <div class="stars text-yellow-500">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-half-outline"></ion-icon>
                            </div>
                            <div class="flex items-center justify-start gap-4 font-semibold text-sm">
                                <strong>Php {{$product->price}}.00</strong>
                            </div>
                        </div>
                        @empty
                        <p>No products available in this category.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- footer -->
    @include('home.footer')

    <!-- js -->
    @include('home.js')
</body>

</html>