 <div class="scrollbar" data-simplebar>
     <ul class="navbar-nav" id="navbar-nav">

         <li class="nav-item">
             <a class="nav-link" href="{{ route('vendor.index') }}">
                 <span class="nav-icon">
                     <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                 </span>
                 <span class="nav-text"> Dashboard </span>
             </a>
         </li>

         <li class="nav-item">
             <a class="nav-link menu-arrow" href="#sidebarCategory" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCategory">
                 <span class="nav-icon">
                     <iconify-icon icon="solar:clipboard-list-bold-duotone"></iconify-icon>
                 </span>
                 <span class="nav-text"> Product </span>
             </a>
             <div class="collapse" id="sidebarCategory">
                 <ul class="nav sub-navbar-nav">
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('product.add') }}">Create</a>
                    </li>
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('product-read') }}">List</a>
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
                        <a class="sub-nav-link" href="{{ route('vendor.order-list') }}">All Orders</a>
                    </li>
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('vendor.order-cancel') }}">Cancelled Orders</a>
                    </li>
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('vendor.order-delivered') }}">Delivered Orders</a>
                    </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
            <a class="nav-link menu-arrow" href="#discountProduct" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarOrders">
                <span class="nav-icon">
                    <iconify-icon icon="solar:bag-smile-bold-duotone"></iconify-icon>
                </span>
                <span class="nav-text"> Discount </span>
            </a>
            <div class="collapse" id="discountProduct">
                <ul class="nav sub-navbar-nav">
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('discount.add') }}">Create</a>
                    </li>
                </ul>
                <ul class="nav sub-navbar-nav">
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('discount-read') }}">List</a>
                    </li>
                </ul>
            </div>
        </li>
     </ul>
 </div>