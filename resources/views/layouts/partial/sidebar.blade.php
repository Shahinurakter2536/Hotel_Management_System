<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <span class="navbar-brand m-0">
            <img src="{{asset('backend/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Hello, {{Auth::user()->username}}</span>
        </span>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">


            @if( Request::is('admin*'))

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/dashboard*') ? 'active bg-gradient-primary': '' }}" href="{{route('admin.dashboard')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/category*') ? 'active bg-gradient-primary': '' }}" href="{{route('admin.category.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">category</i>
                    </div>
                    <span class="nav-link-text ms-1">Room Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/room*') ? 'active bg-gradient-primary': '' }}" href="{{route('admin.room.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">category</i>
                    </div>
                    <span class="nav-link-text ms-1">Rooms</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/facility*') ? 'active bg-gradient-primary': '' }} " href=" {{ route('admin.facility.index') }} ">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">restaurant</i>
                    </div>
                    <span class="nav-link-text ms-1">Facilities</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/reservations*') ? 'active bg-gradient-primary': '' }} " href="{{route('admin.reservations')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Reservations
                        <small>
                            <span class="badge bg-light text-dark">
                                {{ App\Booking::where('status', 0)->count() }}
                            </span>
                        </small>
                    </span>

                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/contact*') ? 'active bg-gradient-primary': '' }} " href="{{route('admin.contact')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">email</i>
                    </div>
                    <span class="nav-link-text ms-1">Client Request</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('admin/notifications*') ? 'active bg-gradient-primary': '' }} " href="{{route('admin.notification.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                    @csrf
                </form>
            </li>
            @endif


            @if( Request::is('client*'))
            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('client/dashboard*') ? 'active bg-gradient-primary': '' }}" href="{{route('client.dashboard')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('client/reservation*') ? 'active bg-gradient-primary': '' }}" href="{{route('client.reservations')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">category</i>
                    </div>
                    <span class="nav-link-text ms-1">My Reservation</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('client/notifications*') ? 'active bg-gradient-primary': '' }} " href="{{route('client.notifications')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ Request::is('client/settings*') ? 'active bg-gradient-primary': '' }} " href="{{route('client.settings')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">settings</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Out</span>
                </a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                    @csrf
                </form>
            </li>
            @endif



        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 ">
        <div class="mx-3">

        </div>
    </div>
</aside>