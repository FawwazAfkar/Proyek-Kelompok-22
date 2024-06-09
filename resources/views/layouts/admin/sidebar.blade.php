 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <x-nav-link :href="Auth::user()->usertype === 'admin' ? route('admin.dashboard') : route('dashboard')">
         <x-application-logo width="60px" height="60px" fill="#ffffff" />
         <span class="text-white"> Admin</span>
     </x-nav-link>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="{{ route('admin.dashboard') }}" class="d-block">{{ Auth::user()->name }}</a>
             </div>
         </div>
         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>
         <nav>
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="{{ route('admin.dashboard') }}" class="nav-link" id="dashboard-link">
                         <i class="nav-icon fa-solid fa-gauge"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item menu-open">
                 <li class="nav-item">
                     <a href="#" class="nav-link" id="user-link">
                         <i class="nav-icon fa-solid fa-user"></i>
                         <p>
                             User
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.user-admin.index') }}" class="nav-link" id="admin-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Admin</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.user-customer.index') }}" class="nav-link" id="customer-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Customer</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.mobil.index') }}" class="nav-link" id="cars-link">
                         <i class="nav-icon fa-solid fa-car"></i>
                         <p>
                             Cars
                             <span class="right badge badge-warning">Check</span>
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link" id="transaksi-link">
                         <i class="nav-icon fa-solid fa-money-bill-wave"></i>
                         <p>
                             Transaksi
                             <i class="fas fa-angle-left right"></i>
                             <span class="badge badge-info right">6</span>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.transaksi-berlangsung.index') }}" class="nav-link"
                                 id="berlangsung-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Berlangsung</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('admin.riwayat-transaksi.index') }}" class="nav-link" id="riwayat-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Riwayat</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <div class="list-divider"></div>
                 <li class="nav-item">
                     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                         <button type="button" class="btn btn-danger nav-link text-white" data-toggle="modal"
                             data-target="#modal-logout">
                             <i class="nav-icon fa-solid fa-sign-out"></i>
                             <p>Logout</p>
                         </button>
                     </div>
                 </li>
             </ul>
         </nav>
     </div>
     <!-- /.sidebar -->
 </aside>
