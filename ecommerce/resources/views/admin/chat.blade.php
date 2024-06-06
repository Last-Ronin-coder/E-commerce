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

            @include('admin.modal')

        </div>

    </main>

    <!--   Core JS Files   -->
    @include('admin.js')
</body>

</html>