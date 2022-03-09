<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-text mx-3">Vidyasena</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ $data['page']  === "dashboard" ? "active" : "" }}">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item {{ $data['page']  === "blogs" ? "active" : "" }}">
        <a class="nav-link" href="/admin/blog">
            <i class="fas fa-blog"></i>
            <span>Blog</span></a>
    </li>

    <li class="nav-item {{ $data['page']  === "banners" ? "active" : "" }}">
        <a class="nav-link" href="/admin/banner">
            <i class="fas fa-bullhorn"></i>
            <span>Banner</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
