<!--Right Sidebar Holder --> 
<nav id="sidebar-right" class="active">
            <div class="sidebar-header">
                <h3><i class="fa fa-cog"></i> SETĂRI</h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#secondarySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user"></i> Cont</a>
                    <ul class="collapse list-unstyled" id="secondarySubmenu">
                    
                        @if(Auth::guard('user')->check())
                            <li class="{{ Request::is('account') ? 'active' : '' }}">
                                <a href="cont.php"><i class="fa fa-user"></i> Contul meu</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @elseif(Auth::guard('admin')->check())
                            <li class="{{ Request::is('controlPanel') ? 'active' : '' }}">
                                <a href="/products"><i class="fa fa-user"></i> Control Panel</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>                       
                        @else 
                                <li>
                                    <a href="{{ url('/login/user') }}">Login as user</a>
                                </li>
                                <li>
                                    <a href="{{ url('/login/admin') }}">Login as admin</a>
                                </li>                     
                        @endif
                    </ul>
                    @if(Auth::guard('user')->check())
                        <li class="{{ Request::is('cart') ? 'active' : '' }}">
                            <a href="/cart"><i class="fas fa-shopping-cart"></i> Cos</a>
                        </li>
                    @endif
                    <li class="{{ Request::is('transport') ? 'active' : '' }}">
                        <a href="/transport"><i class="fa fa-truck"></i> Transport</a>
                    </li>
                    <li class="{{ Request::is('info') ? 'active' : '' }}">
                        <a href="/info"><i class="fa fa-info-circle"></i> Informații utile</a>
                    </li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}">
                        <a href="/"><i class="fa fa-address-book"></i> Contact</a>
                    </li>
                </ul>
        </nav>