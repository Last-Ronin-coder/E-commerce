<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>
    <!-- newspaper popup -->
    @include('home.news')

    <!-- header -->
    @include('home.header')

    <main>

        <div class="mt-10 w-full px-8 lg:px-0 lg:w-5/6 mx-auto flex flex-wrap lg:flex-nowrap flex-col lg:flex-row gap-8 mb-20">
            <div class="testimonial w-full lg:w-2/6">
                <div style="height: 23rem" class="w-full border rounded-xl flex flex-col items-start p-4">
                    <div class="product_pic cursor-pointer overflow-hidden flex flex-col gap-2 w-full bg-white rounded-lg relative">
                        <div class="w-full mb-2" style="background-image: url('/products/{{$data->image}}');">
                            <img class="product_hover_pic w-full h-full" src="/products/{{$data->image}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial w-full lg:w-2/6">
                <div style="height: 23rem" class="w-full border rounded-xl flex flex-col items-start p-4">
                    <h4 class="mb-2 font-bold text-gray-900 text-sm text-sm">
                        Name: {{$data->title}}
                    </h4>
                    <h4 class="mb-2">Category: {{$data->category}}</h4>
                    <div class="mb-2 flex items-center justify-start gap-4">
                        <strong class="text-red-400">Price: Php {{$data->price}}.00</strong>
                    </div>
                    <div class="flex items-center justify-start gap-4">
                        <h4 class="mb-2 text-justify">Description: {{$data->description}}</h4>
                    </div>
                </div>
            </div>

            <div class="testimonial w-full lg:w-2/6">
                <div class="w-full h-28 bg-white border shadow-sm rounded-lg flex items-center justify-start gap-2 cursor-pointer">
                    <div class="w-8 h-8 bg-white rounded-lg shadow-md border flex items-center justify-center cursor-pointer text-gray-700 hover:text-white hover:bg-gray-700">
                        <a href="{{url('add_cart', $data->id)}}"><ion-icon name="bag-add-outline"></ion-icon></a>
                    </div>
                </div>
            </div>
        </div>

        <section class="w-full min-h-auto px-8 lg:px-0 lg:w-5/6 mx-auto mt-16">
            <h1 class="font-semibold text-xl border-b py-4">
                Other Products ({{$data->category}})
            </h1>
            <div class="newProductsContainer">
                <div class="mt-10 w-full px-8 lg:px-0 lg:w-4/9 mx-auto mb-20">
                    <div class="flex gap-8 flex-wrap">

                        @foreach($productCategory as $product)

                        <div class="product_pic cursor-pointer overflow-hidden flex flex-col gap-2 p-4 w-64 h-92 border shadow-md bg-white rounded-lg relative">
                            <div class="productOptions hidden flex-col gap-2 absolute right-2 top-2 text-xl font-semibold z-10">
                                <div class="w-8 h-8 bg-white rounded-lg shadow-md border flex items-center justify-center cursor-pointer text-gray-700 hover:text-white hover:bg-gray-700">
                                    <a href="{{url('product_details', $product->id)}}"><ion-icon name="eye-outline"></ion-icon></a>
                                </div>
                                <div class="w-8 h-8 bg-white rounded-lg shadow-md border flex items-center justify-center cursor-pointer text-gray-700 hover:text-white hover:bg-gray-700">
                                    <a href="{{url('add_cart', $product->id)}}"><ion-icon name="bag-add-outline"></ion-icon></a>
                                </div>
                            </div>
                            <div class="w-full h-1/2 mb-2 bg-cover bg-center" style="background-image: url('/products/{{$product->image}}');">
                                <img class="product_hover_pic w-full h-full" src="/products/{{$product->image}}" alt="" />
                            </div>

                            <h3 class="text-red-500">{!!Str::limit($product->title, 20)!!}</h3>
                            <h5>${{$product->price}}</h5>

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

                        @endforeach

                    </div>
                </div>
            </div>
        </section>


        <!-- {{$data->title}}
        {{$data->price}}
        <img src="/products/{{$data->image}}" alt="" style="width: 50px;">
        {{$data->category}}
        {{$data->quantity}}
        {{$data->description}} -->

    </main>

    <!-- footer -->
    @include('home.footer')

    <!-- js -->
    @include('home.js')
</body>

</html>