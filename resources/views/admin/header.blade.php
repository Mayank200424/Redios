<div class="d-flex align-items-center gap-1">
     <!-- Theme Color (Light/Dark) -->
     <div class="topbar-item">
          <button type="button" class="topbar-button" id="light-dark-mode">
               <iconify-icon icon="solar:moon-bold-duotone" class="fs-24 align-middle"></iconify-icon>
          </button>
     </div>

     <!-- User Dropdown -->
     <div class="dropdown topbar-item">
          <button class="btn btn-link text-decoration-none" type="button" id="userDropdown" data-bs-toggle="dropdown"
               aria-expanded="false">
               <div class="profile-circle">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
               </div>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
               <li>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                         <i class="bx bx-user me-2"></i> Profile
                    </a>
               </li>
               <li>
                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                         <i class="bx bx-log-out me-2"></i> Logout
                    </a>
               </li>
          </ul>
     </div>
</div>