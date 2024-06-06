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
                                    Category Table
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan="3">
                                                <form action="{{url('add_category')}}" method="post">

                                                    @csrf

                                                    <div class="d-flex align-items-center justify-content-end">
                                                        <div class="w-25 input-group input-group-outline">
                                                            <label class="form-label">Type here...</label>
                                                            <input type="text" class="form-control" name="category" required />
                                                        </div>
                                                        <button class="mt-3 btn btn-primary" type="submit">Add Category</button>
                                                    </div>
                                                </form>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Category
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
                                                            {{$data->category_name}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="d-flex justify-content-end me-3">
                                                <a href="{{url('edit_category', $data->id)}}" class="badge badge-sm bg-gradient-info font-weight-bold text-xs me-2">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="{{url('delete_category', $data->id)}}" onclick="confirmation(event)" class="badge badge-sm bg-gradient-danger font-weight-bold text-xs">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
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