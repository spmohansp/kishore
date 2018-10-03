<div class="o-page__sidebar js-page-sidebar">
    <aside class="c-sidebar">
        <div class="c-sidebar__brand">
            <a href="{{ url('commutter/home') }}"> alt="Neat"></a>Last Mile
        </div>
        <div class="c-sidebar__body">
            <ul class="c-sidebar__list">
                <li>
                    <a class="c-sidebar__link @yield('dashboard')" href="{{ url('commutter/home') }}">
                        <i class="c-sidebar__icon feather icon-bar-chart"></i>Dashboard
                    </a>
                </li>
            </ul>

            <li class="c-sidebar__item has-submenu">
                <a class="c-sidebar__link @yield('Orders')" data-toggle="collapse" href="#activeorder" aria-expanded="false" aria-controls="sidebar-submenu">
                    <i class="c-sidebar__icon feather icon-user"></i>Active Order
                </a>

                <div>
                    <ul class="c-sidebar__list collapse" id="activeorder">
                        <li><a class="c-sidebar__link @yield('liveMap')" href="{{ url('commutter/showMap') }}">Live Location</a></li>
                        <li><a class="c-sidebar__link @yield('LiveOrder')" href="{{ url('commutter/liveOrder') }}">Active Order</a></li>
                    </ul>
                </div>
            </li>


            <!-- <li class="c-sidebar__item has-submenu">
                <a class="c-sidebar__link @yield('receiver')" data-toggle="collapse" href="#receiverMenu" aria-expanded="false" aria-controls="sidebar-submenu">
                    <i class="c-sidebar__icon feather icon-user"></i>Receiver
                </a>

                <div>
                    <ul class="c-sidebar__list collapse" id="receiverMenu">
                        <li><a class="c-sidebar__link @yield('addreceiver')" href="{{ url('commutter/addreceiver') }}">Add Receiver</a></li>
                        <li><a class="c-sidebar__link @yield('viewreceiver')" href="{{ url('commutter/viewreceiver') }}">View Receiver</a></li>

                    </ul>
                </div>
            </li> -->
        </div>
        <a class="c-sidebar__footer" href="{{ url('/commutter/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout <i class="c-sidebar__footer-icon feather icon-power"></i>
        </a>
        <form id="logout-form" action="{{ url('/commutter/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </aside>
</div>