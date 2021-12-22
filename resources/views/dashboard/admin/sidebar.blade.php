<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="d-flex gap-3 align-items-center profile">
                <a href="profile">
                    <img src="/assets/images/samples/avatar.png" class="d-block rounded-circle shadow" style="width:70px;height:70px" alt="">
                </a>
                <h3>Hi, {{ Auth::user()->name }}</h3>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item  ">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Dropdown</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="component-alert.html">Alert</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">Badge</a>
                    </li>
                    
                </ul>
            </li>

            <li class="sidebar-title">Content Management</li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Post</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="component-alert.html">All</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">Add</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">User Management</li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Users</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="component-alert.html">All</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="component-badge.html">Add</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" style="background-color: rgba(255, 0, 0, 0.089)" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-door-open-fill text-danger"></i>
                    <span class="text-danger">Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>