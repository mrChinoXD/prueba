<aside id="leftsidebar" class="sidebar">
    <div class="user-info" style="background-color: cornflowerblue;">
        <div class="image">
            <img src="" alt="">
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="#"><i class="material-icons">settings</i>Settings</a>
                    </li>
                    <li role="seperator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            @if(Request::is('admin*'))
                <li class="{{Request::is('admin/customers') ? 'active':''}}">
                    <a href="{{route('admin.customers.index')}}">
                        <i class="material-icons">face</i>
                        <span>Clientes</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/users') ? 'active':''}}">
                    <a href="{{route('admin.users.index')}}">
                        <i class="material-icons">manage_accounts</i>
                        <span>Administradores</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/products') ? 'active':''}}">
                    <a href="{{route('admin.products.index')}}">
                        <i class="material-icons">store</i>
                        <span>Productos</span>
                    </a>
                </li>

                <li class="{{Request::is('admin/sales') ? 'active':''}}">
                    <a href="{{route('admin.sales.index')}}">
                        <i class="material-icons">assignment</i>
                        <span>Ventas</span>
                    </a>
                </li>
            @endif
            @if(Request::is('customer*'))
                <li class="{{Request::is('customer/home') ? 'active':''}}">
                    <a href="{{route('customer.home')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>

</aside>
