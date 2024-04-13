<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('admin.profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            @can('is_admin')
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-address-book"></i>
                        <p>
                            {{ __('Users') }}
                        </p>
                    </a>
                </li>
            @endcan

            @can('is_admin')
                <li class="nav-item">
                    <a href="{{ route('admin.types.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-inbox"></i>
                        <p>
                            {{ __('Kategori') }}
                        </p>
                    </a>
                </li>
            @endcan

            @can('is_admin')
                <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            {{ __('Mobil') }}
                        </p>
                    </a>
                </li>
            @endcan

            @can('is_admin')
                <li class="nav-item">
                    <a href="{{ route('admin.bookings.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            {{ __('Booking') }}
                        </p>
                    </a>
                </li>
            @endcan
            @can('is_rent_user')
                <li class="nav-item">
                    <a href="{{ route('user_rent.bookings.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-credit-card"></i>
                        <p>
                            {{ __('Booking') }}
                        </p>
                    </a>
                </li>
            @endcan
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
