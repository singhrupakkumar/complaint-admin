<style>.sidebar .nav .nav-item .nav-link i.menu-icon {    color: #fff !important;}.sidebar .nav .nav-item .nav-link {    color: #fff !important;}</style><nav class="sidebar sidebar-offcanvas" id="sidebar" style="background: #0179FF !important;">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.complains.add')}}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Add Complain</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.reports') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Reports</span>
            </a>
        </li>				<li class="nav-item">            <a class="nav-link" href="{{ route('admin.settings') }}">                <i class="icon-layout menu-icon"></i>                <span class="menu-title">Settings</span>            </a>        </li>
        
    </ul>
</nav>
