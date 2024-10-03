<div id="wrapper">
    <aside id="sidebar-wrapper">
        <ul class="sidebar-nav h4">
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-plug"></i>Plugins</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"><i class="fa fa-users"></i>Users</a>
            </li>
            @auth
                <li>
                    <a href="/profile"><i class="fa fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        <i class="fa fa-right-from-bracket"></i>Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endauth

            @guest
                <li><a href="/login">Login</a></li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            @endguest
        </ul>
    </aside>
</div>
