@php
    $modules = [
        new class {
            public $Label = 'Dashboard';
            public $RouteName = 'dashboard';
            public $Icon = 'icon-grid';
        },
        new class {
            public $Label = 'Expenses';
            public $RouteName = 'expense';
            public $Icon = 'icon-paper';
        },
        new class {
            public $Label = 'Incomes';
            public $RouteName = 'income';
            public $Icon = 'icon-contract';
        },
    ];
    
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (request()->is('update/income/*') || request()->is('delete/income/*') || request()->is('view/income/*') )
        <li class="nav-item">
          <a class="nav-link hover" href="{{ url('income') }}">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">{{ _("Income") }}</span>
          </a>
      </li>
        @else
        <li></li>
            @foreach ($modules as $item)
                <li class="nav-item {{ request()->routeIs($item->RouteName . '*') ? 'active' : 'nothing' }}">
                    <a class="nav-link hover " href="{{ url($item->RouteName) }}">
                        <i class="{{ $item->Icon }} menu-icon"></i>
                        <span class="menu-title">{{ $item->Label }}</span>
                    </a>
                </li>
            @endforeach
        @endif

    </ul>
</nav>
