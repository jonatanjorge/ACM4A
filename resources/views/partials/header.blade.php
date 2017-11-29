<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->

        <span class="logo-lg"><b>ACM4A</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li>
                    <a href="{{ route("roles.index") }}" data-toggle="tooltip" data-placement="bottom" title="Roles">
                        <i class="fa  fa-group"></i>
                    </a>

                </li>


                <!-- Messages: style can be found in dropdown.less-->
                <li>
                    <a href="{{ route('permisos.index') }}" data-toggle="tooltip" data-placement="bottom" title="Permisos">
                        <i class="fa fa-unlock-alt"></i>
                    </a>

                </li>




                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            {{
                                \Illuminate\Support\Facades\Auth::user()->nombre
                            }}
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                {{ \Illuminate\Support\Facades\Auth::user()->fullname }}
                                <br>
                                <small>Web Developer</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">

                            <a href="{{ route("logout") }}" class="btn btn-block btn-flat">Logout <i class="fa fa-sign-out"></i></a>

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>