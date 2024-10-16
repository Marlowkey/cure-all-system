@php
    $sidebarLinks = [
        ['name' => 'Home', 'icon' => 'fa-home', 'route' => route('home'), 'roles' => ['admin', 'pharmacist', 'rider']],
        ['name' => 'Plugins', 'icon' => 'fa-plug', 'route' => '#', 'roles' => ['admin']],
        ['name' => 'Users', 'icon' => 'fa-users', 'route' => route('users.index'), 'roles' => ['admin']],
        ['name' => 'Orders', 'icon' => 'fa-solid fa-cart-shopping', 'route' => route('orders.index'), 'roles' => ['pharmacist', 'rider']],
        ['name' => 'Medicine', 'icon' => 'fa-solid fa-capsules', 'route' => route('medicines.index'), 'roles' => ['admin', 'pharmacist']],
        ['name' => 'Profile', 'icon' => 'fa-user', 'route' => '/profile', 'roles' => ['admin', 'pharmacist']],
    ];
@endphp
<div id="wrapper">
    <aside id="sidebar-wrapper">
        <ul class="sidebar-nav h5">
            @foreach($sidebarLinks as $link)
                @if(Auth::check() && in_array(Auth::user()->role, $link['roles']))
                    <li>
                        <a href="{{ $link['route'] }}">
                            <i class="fa {{ $link['icon'] }} text-secondary"></i>{{ $link['name'] }}
                        </a>
                    </li>
                @endif
            @endforeach

            @auth
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-right-from-bracket text-secondary"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endauth

            @guest
                <li>
                    <a href="/login">
                        <i class="fa fa-sign-in-alt text-secondary"></i>Login
                    </a>
                </li>
            @endguest
        </ul>
    </aside>
</div>
