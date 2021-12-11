<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">BLK Prov Gorontalo</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BLK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li><a class="nav-link" href="{{ (Auth::user()->roles == 1) ? route('admin.home') : route('penulis.home') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span></a>
            </li>
            @if (Auth::user()->roles == 1)
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i><span>Berita</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('post.index') }}">Post</a></li>
                        <li><a class="nav-link" href="{{ route('category.index') }}">Category</a></li>
                        <li><a class="nav-link" href="{{ route('tag.index') }}">Tag</a></li>
                    </ul>
                </li>
            @else 
                <li><a class="nav-link" href="{{ route('penulis.post.index') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Berita</span></a>
                </li>
            @endif
            <li><a class="nav-link" href="{{ (Auth::user()->roles == 1) ? route('pengumuman.index') : route('penulis.pengumuman.index') }}">
                <i class="fas fa-bullhorn"></i>
                <span>Pengumuman</span></a>
            </li>
            <li><a class="nav-link" href="{{ (Auth::user()->roles == 1) ? route('gallery.index') : route('penulis.gallery.index') }}">
                <i class="fas fa-image"></i>
                <span>Gallery</span></a>
            </li>
            @if (Auth::user()->roles == 1)                
                <li><a class="nav-link" href="{{ route('user.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Users</span></a>
                </li>
                <li><a class="nav-link" href="{{ route('profile.index') }}">
                    <i class="fas fa-cog"></i>
                    <span>Setting Profile</span></a>
                </li>
            @endif
            @if (Auth::user()->roles == 0)
                <li><a class="nav-link" href="{{ route('penulis.account') }}">
                    <i class="fas fa-cog"></i>
                    <span>Setting Account</span></a>
                </li>
            @endif
        </ul>
    </aside>
</div>
