@php
    $modules = [
        new class {
            public $Label = 'Dashboard';
            public $RouteName = 'dashboard';
            public $Icon = 'icon-grid';
            public $Type = 'admin';
        },
        new class {
            public $Label = 'Dashboard';
            public $RouteName = 'dashboard';
            public $Icon = 'icon-grid';
            public $Type = 'normal';
        },
        new class {
            public $Label = 'Expenses';
            public $RouteName = 'expense';
            public $Icon = 'icon-paper';
            public $Type = 'normal';
        },
        new class {
            public $Label = 'Incomes';
            public $RouteName = 'income';
            public $Icon = 'icon-contract';
            public $Type = 'normal';
        },
    
        new class {
            public $Label = 'Users';
            public $RouteName = 'user';
            public $Icon = 'icon-head';
            public $Type = 'admin';
        },
    ];
    
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li></li>
        @foreach ($modules as $item)
            @if ($item->Type == auth()->user()->user_type)
                <li class="nav-item {{ request()->routeIs($item->RouteName . '*') ? 'active' : 'nothing' }}">
                    <a class="nav-link hover " href="{{ url($item->RouteName) }}">
                        <i class="{{ $item->Icon }} menu-icon"></i>
                        <span class="menu-title">{{ $item->Label }}</span>
                    </a>
                </li>
            @endif
        @endforeach

    </ul>
</nav>
