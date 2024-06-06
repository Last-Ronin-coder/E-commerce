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

            <div class="container-fluid py-4">

                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">
                                        Orders
                                    </h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <!-- <tr>
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
                                            </tr> -->
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Customer
                                                </th>

                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Address
                                                </th>

                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Phone
                                                </th>

                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Product
                                                </th>

                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Price
                                                </th>

                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Image
                                                </th>

                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status
                                                </th>

                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Change Status
                                                </th>

                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Print
                                                </th>

                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($data as $data)

                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{$data->name}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{$data->rec_address}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{$data->phone}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{$data->product->title}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{$data->product->price}}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <img src="products/{{$data->product->image}}" alt="product_image" width="20" height="20">
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            @if($data->status == 'in progress')

                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Pending">
                                                                <h6 class="mb-0 text-sm badge badge-sm bg-gradient-info font-weight-bold text-xs me-2">
                                                                    <i class="material-icons">pending</i>
                                                                </h6>
                                                            </span>

                                                            @elseif($data->status == 'to ship')

                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="To Ship">
                                                                <h6 class="mb-0 text-sm badge badge-sm bg-gradient-primary font-weight-bold text-xs me-2">
                                                                    <i class="material-icons">local_shipping</i>
                                                                </h6>
                                                            </span>

                                                            @elseif($data->status == 'completed')

                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Completed">
                                                                <h6 class="mb-0 text-sm badge badge-sm bg-gradient-success font-weight-bold text-xs me-2">
                                                                    <i class="material-icons">check_circle</i>
                                                                </h6>
                                                            </span>

                                                            @elseif($data->status == 'cancelled')

                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Cancelled">
                                                                <h6 class="mb-0 text-sm badge badge-sm bg-gradient-danger font-weight-bold text-xs me-2">
                                                                    <i class="material-icons">block</i>
                                                                </h6>
                                                            </span>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="d-flex justify-content-end me-3">
                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Mark as To Ship">
                                                        <a href="{{url('to_ship', $data->id)}}" class="badge badge-sm bg-gradient-secondary font-weight-bold text-xs me-2">
                                                            <i class="material-icons">local_shipping</i>
                                                        </a>
                                                    </span>
                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Mark as Completed">
                                                        <a href="{{url('completed', $data->id)}}" class="badge badge-sm bg-gradient-warning font-weight-bold text-xs">
                                                            <i class="material-icons">check_circle</i>
                                                        </a>
                                                    </span>
                                                </td>

                                                <td>
                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" title="Print">
                                                        <a href="{{url('print', $data->id)}}" class="badge badge-sm bg-gradient-danger font-weight-bold text-xs">
                                                            <i class="material-icons">print</i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>

                                    <div class="d-flex justify-content-center mt-3">
                                        <!-- $product->onEachSide(1)->links() -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.modal')

            </div>

        </div>

    </main>

    <!--   Core JS Files   -->
    @include('admin.js')
</body>

</html>