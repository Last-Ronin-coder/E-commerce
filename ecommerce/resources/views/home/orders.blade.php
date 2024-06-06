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

        <section class="w-full min-h-auto px-8 lg:px-0 lg:w-5/6 mx-auto mt-10 mb-10 flex gap-8">

            <div class="products w-full flex flex-col">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Price
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        Status
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
                            @foreach($order as $order)
                            <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                                    {{$order->product->title}}
                                </td>
                                <td class="px-6 py-4">
                                    Php {{$order->product->price}}.00
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
                                    @if($order->status == 'in progress')

                                    <h6 class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded w-20">
                                        {{$order->status}}
                                    </h6>

                                    @elseif($order->status == 'to ship')

                                    <h6 class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded w-20">
                                        {{$order->status}}
                                    </h6>

                                    @elseif($order->status == 'completed')

                                    <h6 class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded w-20">
                                        {{$order->status}}
                                    </h6>

                                    @elseif($order->status == 'cancelled')

                                    <h6 class="bg-red-500 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded w-20">
                                        {{$order->status}}
                                    </h6>

                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <img class="w-8" src="/products/{{$order->product->image}}" alt="">
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{url('cancelOrder', $order->id)}}" class="font-medium text-red-600 light:text-red-500 hover:underline">Cancel</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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