<section id="header">
    <a href="#"><img src="{{ asset('img/icon.png') }}" class="logo" alt="none" width="18%"></a>

    <div>
        <ul id="navbar" class="list-unstyled">
            <li>
                <a class="form-outline" data-mdb-input-init>
                    <input type="search" id="form1" class="form-control" />
                </a>
            </li>

            <li>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                    <i class="fas fa-search"></i>
                </button>
            </li>

            <li><a class="active" href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('assets/about.php') }}">About</a></li>
            <li><a href="{{ url('assets/admins.php') }}">Admins</a></li>

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

            <li><a href="{{ url('assets/customer_profile.php') }}">Profile</a></li>
            <li><a href="{{ url('assets/logsign.php') }}">Signup</a></li>

            <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
        </ul>
    </div>

    <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>
