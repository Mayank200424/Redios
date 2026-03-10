 <div class="scrollbar" data-simplebar>
     <ul class="navbar-nav" id="navbar-nav">

         <li class="nav-item">
             <a class="nav-link" href="{{ route('deliveryboy.index') }}">
                 <span class="nav-icon">
                     <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                 </span>
                 <span class="nav-text"> Dashboard </span>
             </a>
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
                        <a class="sub-nav-link" href="{{ route('deliveryboy.assignedorder')}}">Assigend Orders</a>
                    </li>
                    <li class="sub-nav-item">
                        <a class="sub-nav-link" href="{{ route('deliveryboy.deliveredorder') }}">Delivered Orders</a>
                    </li>
                 </ul>
             </div>
         </li>
     </ul>
 </div>