<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">BLK Gorontalo</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BLK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="{{ route('post.index') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>Berita</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('post.index') }}">Post</a></li>
                    <li><a class="nav-link" href="{{ route('category.index') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('tag.index') }}">Tag</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-user"></i>
                <span>Users</span></a>
            </li>
        </ul>
    </aside>
</div>
