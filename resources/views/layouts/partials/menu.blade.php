<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}">BK-Online</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard')}}">BK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown @if(url()->current() == route('dashboard')) active @endif">
                <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @auth
                @if (auth()->user()->role === 'guru')
                    @include('layouts.partials.menus.guru')
                @endif
                @if (auth()->user()->role === 'siswa')
                    @include('layouts.partials.menus.siswa')
                @endif
                @if (auth()->user()->role === 'wali_murid')
                    @include('layouts.partials.menus.wali-murid')
                @endif
            @endauth
        </ul>
    </aside>
</div>
