<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="{{asset('adminmain/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo" />
            <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2" />
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('admin/dashboard')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('view_category')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">category</i>
                    </div>
                    <span class="nav-link-text ms-1">Category</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    Product
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('view_product')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">preview</i>
                    </div>
                    <span class="nav-link-text ms-1">View Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#" data-bs-toggle="modal" data-bs-target="#addProduct">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add_shopping_cart</i>
                    </div>
                    <span class="nav-link-text ms-1">Add Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('orders')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">local_shipping</i>
                    </div>
                    <span class="nav-link-text ms-1">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('chat')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">chat</i>
                    </div>
                    <span class="nav-link-text ms-1">Chat</span>
                </a>
            </li>
        </ul>
    </div>
</aside>