<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">local_shipping</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">
                        Orders
                    </p>
                    <h4 class="mb-0">{{$order}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="card-footer p-3">
                <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+55% </span>than last week
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">inventory_2</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">
                        Products
                    </p>
                    <h4 class="mb-0">{{$product}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="card-footer p-3">
                <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+3% </span>than last month
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">
                        Customers
                    </p>
                    <h4 class="mb-0">{{$user}}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="card-footer p-3">
                <p class="mb-0">
                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                    than yesterday
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">attach_money</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">
                        Sales
                    </p>
                    <h4 class="mb-0">$103,430</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0" />
            <div class="card-footer p-3">
                <p class="mb-0">
                    <span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0">Daily Orders</h6>
                <p class="text-sm">Last Campaign Performance</p>
                <hr class="dark horizontal" />
                <div class="d-flex">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">
                        campaign sent 2 days ago
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0">Daily Sales</h6>
                <p class="text-sm">
                    (<span class="font-weight-bolder">+15%</span>) increase in today sales.
                </p>
                <hr class="dark horizontal" />
                <div class="d-flex">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">
                        updated 4 min ago
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4 mb-3">
        <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0">Completed Delivery</h6>
                <p class="text-sm">Last Campaign Performance</p>
                <hr class="dark horizontal" />
                <div class="d-flex">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">just updated</p>
                </div>
            </div>
        </div>
    </div>
</div>