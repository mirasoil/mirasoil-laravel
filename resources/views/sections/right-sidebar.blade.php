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
                                <a href="/user"> Contul meu</a>
                            </li>
                            <li class="{{ Request::is('account') ? 'active' : '' }}">
                                <a href="/myorders"> Comenzile mele</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Delogare') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @elseif(Auth::guard('admin')->check())
                            <li class="{{ Request::is('controlPanel') ? 'active' : '' }}">
                                <a href="/products"> Gestionare produse</a>
                            </li>
                            <li class="{{ Request::is('account') ? 'active' : '' }}">
                                <a href="/orders"> Gestionare comenzi</a>
                            </li>
                            <li class="{{ Request::is('account') ? 'active' : '' }}">
                                <a href="/users"> Gestionare utilizatori</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Delogare') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>                       
                        @else 
                                <li>
                                    <a href="{{ url('/login/user') }}">Logare</a>
                                </li>     
                                <li>
                                <a href="{{ url('/register/user') }}">Înregistrare</a>
                                </li>                
                        @endif
                    </ul>
                    @if(Auth::guard('user')->check())
                        <li class="{{ Request::is('cart') ? 'active' : '' }}">
                            <a href="/cart"><i class="fas fa-shopping-cart"></i> Coș</a>
                        </li>
                    @endif
                    <li class="{{ Request::is('transport') ? 'active' : '' }}">
                        <a href="/transport"><i class="fa fa-truck"></i> Transport</a>
                    </li>
                    <li class="{{ Request::is('info') ? 'active' : '' }}">
                        <a href="/info"><i class="fa fa-info-circle"></i> Informații utile</a>
                    </li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}">
                        <a href="/#contact"><i class="fa fa-address-book"></i> Contact</a>
                    </li>
                    @if(Auth::guard('admin')->check() || Auth::guard('user')->check())
                    
                    @else 
                    <li class="{{ Request::is('admin') ? 'active' : '' }}">
                        <a href="{{ route('login.admin', app()->getLocale()) }}"><i class="fas fa-user-lock"></i> {{ __('Admin') }}</a>
                    </li>
                    @endif
                </ul>
        </nav>