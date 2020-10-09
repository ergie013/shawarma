<style>
.extra-menu{min-width:500px}@media (min-width:320px) and (max-width:767px){.extra-menu{min-width:auto}}
</style>
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand wmin-0 mr-5">
        @role("Admin")
        <a href="{{ route('admin.dashboard') }}" class="d-inline-block">
        <img src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/images/unnamed1.png" alt="Dashboard">
        </a>
        @endif
        @role("Store Owner")
        <a href="{{ route('restaurant.dashboard') }}" class="d-inline-block">
        <img src="{{substr(url("/"), 0, strrpos(url("/"), '/'))}}/assets/backend/global_assets/images/unnamed1.png" alt="Dashboard">
        </a>
        @endrole
    </div>
    <div class="header-text">
        @role("Admin")
    <p>Admin Dashboard</p>
        @endif
        @role("Store Owner")
    <p>Restaurant Dashboard</p>
    @endrole
    </div>
    <div class="d-md-none">
        <button class="navbar-toggler dropdown-toggle" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <span>{{ Auth::user()->name }}</span>
        </button>
        <div class="dropdown-menu dropdown-menu-right" id="navbar-mobile">
            <a href="{{ route('logout') }}" class="dropdown-item"><i class="icon-switch2"></i> {{ __('storeDashboard.navLogout') }}</a>
        </div>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('logout') }}" class="dropdown-item"><i class="icon-switch2"></i> {{ __('storeDashboard.navLogout') }}</a>
                </div>
            </li>
            @role("Store Owner")
                @impersonating
                <li class="nav-item">
                    <a class="navbar-nav-link active" href="{{ route('impersonate.leave') }}"><i class="icon-arrow-left15 mr-1"></i>Go back to Admin</a>
                </li>
                @endImpersonating
            @endrole
        </ul>
    </div>
</div>
<div class="navbar navbar-expand-md navbar-light navbar-sticky">
    <div class="container">
        <div class="text-center d-md-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
            <i class="icon-unfold mr-2"></i>
            Navigation
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-navigation">
            <ul class="navbar-nav">
                @role("Admin")
                <li class="nav-item">
                    <a href="{{ route("admin.restaurants") }}" class="navbar-nav-link {{ Request::is('admin/stores') ? 'active' : '' }}">
                    <i class="icon-store2 mr-2"></i>
                    Restuarants
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="navbar-nav-link dropdown-toggle {{ Request::is('admin/items')  || Request::is('admin/addons') ? 'active' : '' }}" data-toggle="dropdown">
                    <i class="icon-stack-star mr-2"></i>
                    Items & Menu
                    </a>
                    <div class="dropdown-menu">
                    <a href="{{ route("admin.addonCategories") }}" class="dropdown-item {{ Request::is('admin/addoncategories') ? 'active' : '' }}">
                    <i class="icon-tree6 mr-2"></i>
                    Addon Categories
                    </a>
                    <a href="{{ route("admin.addons") }}" class="dropdown-item {{ Request::is('admin/addons') ? 'active' : '' }}">
                    <i class="icon-list2 mr-2"></i>
                    Addons
                    </a>
                    <a href="{{ route("admin.itemcategories") }}" class="dropdown-item {{ Request::is('admin/itemcategories') ? 'active' : '' }}">
                    <i class="icon-grid52 mr-2"></i>
                    Menu Categories
                    </a>
                    <a href="{{ route("admin.items") }}" class="dropdown-item {{ Request::is('admin/items') ? 'active' : '' }}">
                    <i class="icon-grid mr-2"></i>
                    Items
                    </a>
                     </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.orders") }}" class="navbar-nav-link {{ Request::is('admin/orders') ? 'active' : '' }}">
                    <i class="icon-basket mr-2"></i>
                    Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="navbar-nav-link {{ Request::is('admin/earnings') ? 'active' : '' }}">
                    <i class="icon-coin-dollar mr-2"></i>
                    Earnings
                    </a>
                </li>
                @endrole

                @role("Store Owner")
                <li class="nav-item">
                    <a href="{{ route("restaurant.restaurants") }}" class="navbar-nav-link {{ Request::is('restaurant-owner/restaurants') ? 'active' : '' }}">
                    <i class="icon-store2 mr-2"></i>
                    {{__('storeDashboard.navStores')}}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="navbar-nav-link dropdown-toggle {{ Request::is('restaurant-owner/items')  || Request::is('restaurant-owner/addons') ? 'active' : '' }}" data-toggle="dropdown">
                    <i class="icon-stack-star mr-2"></i>
                    {{__('storeDashboard.navItemsMenu')}}
                    </a>
                    <div class="dropdown-menu">
                    <a href="{{ route("restaurant.addonCategories") }}" class="dropdown-item {{ Request::is('restaurant-owner/addoncategories') ? 'active' : '' }}">
                    <i class="icon-tree6 mr-2"></i>
                    {{__('storeDashboard.navSubAddonCat')}}
                    </a>
                    <a href="{{ route("restaurant.addons") }}" class="dropdown-item {{ Request::is('restaurant-owner/addons') ? 'active' : '' }}">
                    <i class="icon-list2 mr-2"></i>
                    {{__('storeDashboard.navSubAddon')}}
                    </a>
                    <a href="{{ route("restaurant.itemcategories") }}" class="dropdown-item {{ Request::is('restaurant-owner/itemcategories') ? 'active' : '' }}">
                    <i class="icon-grid52 mr-2"></i>
                    {{__('storeDashboard.navSubMenuCat')}}
                    </a>
                    <a href="{{ route("restaurant.items") }}" class="dropdown-item {{ Request::is('restaurant-owner/items') ? 'active' : '' }}">
                    <i class="icon-grid mr-2"></i>
                    {{__('storeDashboard.navSubItems')}}
                    </a>
                     </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route("restaurant.orders") }}" class="navbar-nav-link {{ Request::is('restaurant-owner/orders') ? 'active' : '' }}">
                    <i class="icon-basket mr-2"></i>
                    {{__('storeDashboard.navOrders')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("restaurant.earnings") }}" class="navbar-nav-link {{ Request::is('restaurant-owner/earnings/*') ? 'active' : '' }}">
                    <i class="icon-coin-dollar mr-2"></i>
                    {{__('storeDashboard.navEarnings')}}
                    </a>
                </li>
                @endrole
            </ul>
        </div>
    </div>
</div>