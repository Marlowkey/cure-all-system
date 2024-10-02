<section id="header">
    <a href="/home"><img src="{{ asset('img/icon.png') }}" class="logo" alt="none" width="18%"></a>

    <div>
        <ul id="navbar" class="list-unstyled">
            @auth
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
            @endauth

            @guest
                <li><a href="/login">Login</a></li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            @endguest

        </ul>
    </div>

    <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>


