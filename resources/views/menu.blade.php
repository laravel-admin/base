<header>
    <ul id="slide-out" class="side-nav fixed custom-scrollbar">
        <li>
            <div class="user-box">
                <img src="http://mdbootstrap.com/images/avatars/img%20(10)" class="img-fluid rounded-circle">
                <p class="user text-xs-center">{{ auth()->user()->name }}</p>
            </div>
        </li>

        <li>
            <ul class="collapsible collapsible-accordion">
                <li>
                    <a href="#" class="collapsible-header waves-effect arrow-r">
                        <i class="fa fa-pie-chart"></i> Analytics
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    <nav class="navbar navbar-fixed-top scrolling-navbar double-nav">
        <div class="pull-left">
            <a href="#" data-activates="slide-out" class="button-collapse">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        <!-- Breadcrumb-->
        <div class="breadcrumb-dn">
            <p>Admin</p>
        </div>


        <ul class="nav navbar-nav pull-right">
            <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="post" id="logout">
                    {{ csrf_field() }}
                    <button class="nav-link" type="submit" aria-haspopup="true" aria-expanded="false" form="logout">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                </form>
            </li>
        </ul>

    </nav>
    <!--/.Navbar-->

</header>
<!--/Double Navigation-->
