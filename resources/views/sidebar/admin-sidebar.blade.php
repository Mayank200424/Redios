<div class="scrollbar" data-simplebar>
    <ul class="navbar-nav" id="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <span class="nav-icon">
                    <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                </span>
                <span class="nav-text"> Dashboard </span>
            </a>
        </li>

         <li class="nav-item">
            <a class="nav-link menu-arrow" href="#sidebarCustomers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCustomers">
                <span class="nav-icon">
                    <iconify-icon icon="solar:users-group-two-rounded-bold-duotone"></iconify-icon>
                </span>
                <span class="nav-text"> Customers </span>
            </a>
            <div class="collapse" id="sidebarCustomers">
                <ul class="nav sub-navbar-nav">

                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('admin.customer') }}">List</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-arrow" href="#sidebarSellers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSellers">
                <span class="nav-icon">
                    <iconify-icon icon="solar:shop-bold-duotone"></iconify-icon>
                </span>
                <span class="nav-text"> Vendors </span>
            </a>
            <div class="collapse" id="sidebarSellers">
                <ul class="nav sub-navbar-nav">
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('admin.vendor') }}">List</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-arrow" href="#sidebarDeliveryBoy" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSellers">
                <span class="nav-icon">
                    <iconify-icon icon="solar:shop-bold-duotone"></iconify-icon>
                </span>
                <span class="nav-text"> Delivery Boy </span>
            </a>
            <div class="collapse" id="sidebarDeliveryBoy">
                <ul class="nav sub-navbar-nav">
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('admin.deliveryboy') }}">List</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                <span class="nav-icon">
                    <iconify-icon icon="solar:t-shirt-bold-duotone"></iconify-icon>
                </span>
                <span class="nav-text"> Category </span>
            </a>
            <div class="collapse" id="sidebarProducts">
                <ul class="nav sub-navbar-nav">
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('category.add') }}">Create</a>
                    </li>
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('admin.category') }}">List</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCategory">
                <span class="nav-icon">
                    <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                </span>
                <span class="nav-text"> SubCategory </span>
            </a>
            <div class="collapse" id="sidebarCategory">
                <ul class="nav sub-navbar-nav">
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('subcategory.add') }}">Create</a>
                    </li>
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('admin.subcategory')  }}">List</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link menu-arrow" href="#sidebarOrders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                <span class="nav-icon">
                    <iconify-icon icon="solar:bag-smile-bold-duotone"></iconify-icon>
                </span>
                <span class="nav-text"> Orders </span>
            </a>
            <div class="collapse" id="sidebarOrders">
                <ul class="nav sub-navbar-nav">
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('order-list') }}">All Orders</a>
                    </li>
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('order-cancel') }}">Cancelled Orders</a>
                    </li>
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('order-delivered') }}">Delivered Orders</a>
                    </li>
                </ul>
            </div>
        </li>
        
    </ul>
</div>