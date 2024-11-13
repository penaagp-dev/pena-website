 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('assets/dist/img/pena.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">PENA Profile</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">

                 <li class="nav-item ">
                     <a href="{{ url('/cms/admin') }}"
                         class="nav-link {{ request()->is('cms/admin') ? 'active' : '' }}">
                         <i class="nav-icon fa-solid fa-home"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-item ">
                     <a href="{{ url('/cms/admin/core-management') }}"
                         class="nav-link {{ request()->is('cms/admin/core-management') ? 'active' : '' }}">
                         <i class="nav-icon fa-solid fa-user"></i>
                         <p>Pengurus Inti</p>
                     </a>
                 </li>
                 <li class="nav-item ">
                    <a href="{{ url('/cms/admin/register-ca') }}"
                        class="nav-link {{ request()->is('cms/admin/register-ca') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>Data registrasi ca</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cms/admin/inventaris') }}"
                        class="nav-link {{ request()->is('cms/admin/inventaris/') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>Inventaris Barang</p>
                    </a>
                </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
