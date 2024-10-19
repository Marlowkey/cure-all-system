@php
    $sidebarLinks = [
        ['name' => 'Home', 'icon' => 'fa-home', 'route' => route('home'), 'roles' => ['admin', 'pharmacist', 'rider']],
        ['name' => 'Transaction', 'icon' => 'fa-solid fa-money-bill-transfer', 'route' => route('admin.audit.trails'), 'roles' => ['admin']],
        ['name' => 'Users', 'icon' => 'fa-users', 'route' => route('users.index'), 'roles' => ['admin']],
        ['name' => 'Orders', 'icon' => 'fa-solid fa-cart-shopping', 'route' => route('orders.index'), 'roles' => ['pharmacist', 'rider']],
        ['name' => 'Medicine', 'icon' => 'fa-solid fa-capsules', 'route' => route('medicines.index'), 'roles' => ['pharmacist']],
        ['name' => 'Profile', 'icon' => 'fa-user', 'route' => '/profile', 'roles' => ['admin', 'pharmacist']],
    ];
@endphp
<div id="wrapper">
    <aside id="sidebar-wrapper">
        <ul class="sidebar-nav h5">
            @auth
                @if(Auth::user()->role == 'admin')
                    <li class="sidebar-label">Admin</li>
                @elseif(Auth::user()->role == 'pharmacist')
                    <li class="sidebar-label">Pharmacy</li>
                @elseif(Auth::user()->role == 'rider')
                    <li class="sidebar-label">Rider</li>
                @endif
            @endauth

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

<style>
    .sidebar-label {
        font-weight: bold;
        color: #007bff; /* Bootstrap primary color */
        margin: 10px 0; /* Add some spacing above and below the label */
        text-transform: uppercase; /* Make the label uppercase */
        font-size: 1.1rem; /* Slightly larger font size */
        letter-spacing: 1px; /* Increase space between letters for readability */
        border-bottom: 2px solid #007bff; /* Add a bottom border for a polished look */
        padding-bottom: 5px; /* Space between the text and the border */
        transition: color 0.3s; /* Smooth transition for color change */
    }

    .sidebar-label:hover {
        color: #0056b3; /* Darken the color on hover for interactivity */
        cursor: pointer; /* Change the cursor to pointer on hover */
    }
</style>

