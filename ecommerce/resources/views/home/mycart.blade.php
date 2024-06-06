<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>
    <!-- header -->
    @include('home.header')

    <main>

        <section class="w-full min-h-auto px-8 lg:px-0 lg:w-5/6 mx-auto mt-10 mb-10 flex gap-8">

            <aside class="sticky top-0 hidden lg:flex flex-col lg:w-1/4 max-h-screen">
                <div class="aside_section overflow-y-auto">
                    <div class="categories w-full rounded-xl p-4 bg-white border shadow-lg">
                        <h1 class="text-xl font-semibold mb-4">Delivery Details</h1>
                        <div class="border-b pb-3 text-lg text-gray-600">
                            <div class="flex items-center gap-2">
                                <form id="order-form" action="{{ url('confirm_order') }}" method="post">
                                    @csrf
                                    <div class="mb-2">
                                        <label for="name">Name</label>
                                        <input class="mt-1 w-full h-full p-2 border rounded-xl" type="text" name="name" value="{{ Auth::user()->name }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="address">Address</label>
                                        <textarea class="mt-1 w-full h-full p-2 border rounded-xl" name="address">{{ Auth::user()->address }}</textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label for="phone">Phone</label>
                                        <input class="mt-1 w-full h-full p-2 border rounded-xl" type="text" name="phone" value="{{ Auth::user()->phone }}" required>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <button class="mt-2 w-40 bg-red-500 hover:bg-red-600 active:bg-red-700 focus:outline-none focus:ring focus:ring-red-300 text-white rounded-full p-2" type="submit">Place Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="products w-full lg:w-3/4 flex flex-col">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Price
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Image
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $value = 0; ?>
                            @foreach($cart as $item)
                            <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <input id="item-{{$item->id}}" name="item_{{$item->id}}" type="checkbox" class="item-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-price="{{$item->product->price}}">
                                        <label class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                                    {{$item->product->title}}
                                </th>
                                <td class="px-6 py-4">
                                    Php {{$item->product->price}}.00
                                </td>
                                <td class="px-6 py-4">
                                    <img class="w-8" src="/products/{{$item->product->image}}" alt="">
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" data-url="{{url('deleteCart', $item->id)}}" class="font-medium text-red-600 light:text-red-500 hover:underline deleteCart">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                            <th scope="row" class="py-4 px-6 flex justify-end">Total Value:&nbsp;&nbsp;<strong>Php <span id="total-value">{{$value}}</span></strong></th>
                        </thead>
                    </table>
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