<div class="o-page__sidebar js-page-sidebar">
    <aside class="c-sidebar">
        <div class="c-sidebar__brand">
            <a href="{{ url('hub/home') }}"> alt="Neat"></a>Last Mile
        </div>


        <div class="c-sidebar__body">
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link @yield('dashboard')" href="{{ url('hub/home') }}">
                        <i class="c-sidebar__icon feather icon-bar-chart"></i>Dashboard
                    </a>
                </li>
            </ul>


             <li class="c-sidebar__item has-submenu">
                    <a class="c-sidebar__link @yield('product')" data-toggle="collapse" href="#sidebar-submenu1" aria-expanded="false" aria-controls="sidebar-submenu">
                        <i class="c-sidebar__icon feather icon-user "></i>Product
                    </a>

                    <div>
                        <ul class="c-sidebar__list collapse" id="sidebar-submenu1">
                            <li><a class="c-sidebar__link @yield('addproduct')" href="{{ url('hub/addproduct') }}">Add Product</a></li>
                            <li><a class="c-sidebar__link @yield('viewproduct')" href="{{ url('hub/viewproduct') }}">View Product</a></li>
                             <li><a class="c-sidebar__link @yield('addproduct')" href="{{ url('hub/addreceiver') }}">Add Receiver</a></li>
                        </ul>
                    </div>


        </div>

        <a class="c-sidebar__footer" href="{{ url('/hub/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
        </a>
        <form id="logout-form" action="{{ url('/hub/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </aside>
</div>