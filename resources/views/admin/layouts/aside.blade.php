<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{asset('adminLogo.jpeg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Category</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('admin.product.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Product</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.order.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Orders</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
             
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
