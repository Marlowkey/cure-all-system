<section id="header">
    <a href="/home"><img src="{{ asset('img/icon.png') }}" class="logo" alt="none" width="18%"></a>

    <div>
        <ul id="navbar" class="list-unstyled ">
            <form action="/search" method="GET" class="row g-2">
                <div class="col-12 col-md-12 col-lg-12 mx-auto">
                    <div class="input-group">
                        <input type="search" class="form-control w-auto" name="q" placeholder="Search..." />
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>

            <li class="mt-3 mt-md-0">
                <a class="{{ request()->is('/') ? 'active' : '' }}" href="/home">Home</a>
            </li>
            <li><a class="{{ request()->is('about') ? 'active' : '' }}" href="/about">About</a></li>
            <li><a class="{{ request()->is('medicines') ? 'active' : '' }}" href="/medicines">Medicine</a></li>
            <li><a class="{{ request()->is('orders') ? 'active' : '' }}" href="{{ route('orders.index') }}">Track Orders</a></li>

            <li class="dropdown">
                <a class="dropbtn">
                    Services <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown-content" id="dr">
                    <a href="{{ url('assets/Service1.php') }}">Service 1</a>
                    <a href="{{ url('assets/Service2.php') }}">Service 2</a>
                    <a href="{{ url('assets/Service3.php') }}">Service 3</a>
                </div>
            </li>
            @auth
            @if(Auth::user()->role != 'customer')
            <li><a href="/home">Dashboard</a></li>
            @else
            <li class="dropdown">
                <a class="{{ request()->is('profile') ? 'active' : '' }}" class="dropbtn">
                    {{ Auth::user()->name }} <i class="fas fa-chevron-down"></i>
                </a>
                <div class="dropdown-content" id="dr">
                    <a href="/profile">Profile</a>



                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Log Out') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endif

        @endauth

            @guest
                <li><a href="/login">Login</a></li>
              
            @endguest
            <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>

        </ul>
    </div>
    

    <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>


