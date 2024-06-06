<!DOCTYPE html>
<html lang="en">

<head>
    <!-- css -->
    @include('admin.css')
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('admin.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->

        @include('admin.header')

        <!-- End Navbar -->

        <div class="container-fluid py-4">

            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    Product Table
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <form action="{{url('product_search')}}" method="get">

                                                    @csrf

                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <div class="w-25 input-group input-group-outline">
                                                            <label class="form-label">Type here...</label>
                                                            <input type="text" class="form-control" name="search" />
                                                        </div>
                                                        <button class="mt-3 btn btn-primary" type="submit">Search</button>
                                                    </div>
                                                </form>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Product
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Description
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Category
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Price
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Quantity
                                            </th>

                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Image
                                            </th>

                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($product as $products)

                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {!!Str::limit($products->title, 10)!!}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {!!Str::limit($products->description, 30)!!}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{$products->category}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            Php {{$products->price}}.00
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{$products->quantity}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            <img src="products/{{$products->image}}" alt="product_image" width="20" height="20">
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="d-flex justify-content-end me-3">
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Edit">
                                                    <a href="#" data-id="{{$products->id}}" class="badge badge-sm bg-gradient-info font-weight-bold text-xs me-2 edit-button">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                </span>
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Delete">
                                                    <a href="{{url('delete_product', $products->id)}}" onclick="confirmation(event)" class="badge badge-sm bg-gradient-danger font-weight-bold text-xs">
                                                        <i class="material-icons">delete</i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-center mt-3">
                                    {{$product->onEachSide(1)->links()}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.modal')

        </div>

    </main>

    <!--   Core JS Files   -->
    @include('admin.js')
</body>

</html>