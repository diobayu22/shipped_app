<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="  {{ asset('backend/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="/dashboard" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end"></span>
                        <span> Dashboards </span>
                    </a>

                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="{{ route('all.container') }}">
                        <i class="mdi mdi-calendar"></i>
                        <span> Container </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.uom') }}">
                        <i class="mdi mdi-forum-outline"></i>
                        <span> UOM </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.departement') }}">
                        <i class="mdi mdi-domain"></i>
                        <span> Departement </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.supplier') }}">
                        <i class="mdi mdi-book-account-outline"></i>
                        <span> Supplier </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.item') }}">
                        <i class="mdi mdi-black-mesa"></i>
                        <span> Item </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('all.shipment') }}">
                        <i class="mdi mdi-briefcase-check-outline"></i>
                        <span> Shipment</span>
                    </a>
                </li>


        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
