<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
        <img src="{{asset('assets/admin/img/logo-mini.png')}}" alt="Админи панель проекта" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{__('admin.title')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->img == null)
                    <img class="img-circle elevation-2" alt="{{ Auth::user()->name }}" src="{{asset('/assets/img-admin/logo-mini.png')}}"
                         alt="{{Auth::user()->name}}">
                @else <img class="img-circle elevation-2" alt="{{ Auth::user()->name}}" src="{{asset('/uploads/' . Auth::user()->img)}}" alt="{{ Auth::user()->name}}">
                @endif

            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Shop
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.products.index')}}" class="nav-link">
                                <i class="far fa-address-card"></i>
                                <p>{{__('admin.products')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product_categories.index')}}" class="nav-link">
                                <i class="far fa-calendar-alt"></i>
                                <p>{{__('admin.categories')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menus -->
    </div>
    <!-- /.sidebar -->
</aside>
