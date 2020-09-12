<div class="app-header1 header py-1 d-flex">
    <div class="container-fluid d-flex">
        <a class="header-brand d-flex h-100" href="#">
            {{-- <img src="g/img/zone.png" width="70px" margin-top="70px" alt="" title=""> --}}
            <img src="{{asset('g/img/zone.png')}}" class="header-brand-img my-auto" alt="Plight logo">
            <span class="text-light text-left my-auto ml-2">
                <h4 class="m-0">Admin </h4>
            </span>
        </a>
        <div class="menu-toggle-button">
            <a class="nav-link wave-effect" href="#" id="sidebarCollapse">
                <span class="fa fa-bars"></span>
            </a>
        </div>
        <div class="d-flex order-lg-2 ml-auto">
            <div class="dropdown d-none d-md-flex mt-1"> <a class="nav-link icon" data-toggle="dropdown"> <i
                        class="fe fe-grid floating"></i> </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-0">
                    <ul class="drop-icon-wrap p-0 m-0">
                        <li> 
                            <a href="{{ url('/') }}" class="drop-icon-item"> <i class="fa fa-desktop"></i> 
                                <span class="block"> Go to web</span> 
                            </a>
                        </li>                        
                    </ul>
                </div>
            </div>
            <div class="dropdown mt-1">
                <a href="#" class="nav-link pr-0 leading-none h-100" data-toggle="dropdown">
                    <span class="text-light text-left my-auto">
                        <h5 class="m-0">{{ Auth::user()->name }}</h5>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i> Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
