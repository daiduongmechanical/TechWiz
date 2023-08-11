<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
        <img src="admins/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
            <div class="image">
                <img src="admins/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>

            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active ">
                        <i class=" nav-icon dfas fa-user "></i>
                        <p>
                            User management
                            <i class="right fas fa-angle-left "></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ url('/admin/list-user') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Users management </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/index') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin management</p>

                            </a>
                        </li>
                    </ul>
                </li>

                <!-- end user manage -->

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class=" nav-icon dfas fa-user"></i>
                        <p>
                            Product management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ url('/admin/product/index') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Product management </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/add_prodcut/index') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>

                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Provider  -->


                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class=" nav-icon dfas fa-user"></i>
                        <p>
                            Provider management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ url('provider/index') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Provider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('provider/create') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Provider</p>

                            </a>
                        </li>
                    </ul>
                </li>

                

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class=" nav-icon dfas fa-user"></i>
                        <p>
                           Category Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ url('category/index') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                  
                        <li class="nav-item">
                            <a href="{{ url('category/create') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>

                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class=" nav-icon dfas fa-user"></i>
                        <p>
                            Blog management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="{{ url('blog/index') }}" class="nav-link bg-light text-dark">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog List</p>
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