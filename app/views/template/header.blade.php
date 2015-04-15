<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="/" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <img src='/img/left-logo.png' />
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->

                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#">
                        <i class="glyphicon glyphicon-user"></i>
                        <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} {{ Auth::user()->store }}</span>
                    </a>

                </li>

            </ul>
            <a href="/logout" style="position: relative; top: 14px; right: 18px;" class="btn btn-xs btn-default">Sign out</a>
        </div>
    </nav>
</header>
