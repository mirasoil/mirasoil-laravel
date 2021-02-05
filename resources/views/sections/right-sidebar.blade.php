<!--Right Sidebar Holder --> 
<nav id="sidebar-right" class="active">
            <div class="sidebar-header">
                <h3><i class="fa fa-cog"></i> SETĂRI</h3>
            </div>
            @php
            $text=$_SERVER['PHP_SELF'];
            $rest = substr("$text", 13);
            echo '<ul class="list-unstyled components">
                    <li class="active">
                        <a href="#secondarySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user"></i> Cont</a>
                        <ul class="collapse list-unstyled" id="secondarySubmenu">';
            if (isset($_SESSION['utilId'])) {
                echo '<li class="active">
                        <a href="cont.php"><i class="fa fa-user"></i> Contul meu</a>
                    </li>
                    <li>
                        <a href="cont.php"><i class="fa fa-cog"></i> Setări</a>
                    </li>
                    <li>
                        <a href="delogare.php"><i class="fas fa-sign-out-alt"></i> Delogare</a>
                    </li>';
            }
            elseif ($rest === 'logare.php') {
                echo '<li class="active">
                            <a href="logare.php"><i class="fas fa-sign-in-alt"></i> Logare</a>
                    </li>
                    <li>
                        <a href="inregistrare.php"><i class="fas fa-user-plus"></i> Inregistrare</a>
                    </li>'; 
            } elseif ($rest === 'inregistrare.php'){
                echo '<li>
                        <a href="logare.php"><i class="fas fa-sign-in-alt"></i> Logare</a>
                    </li>
                    <li class="active">
                        <a href="inregistrare.php"><i class="fas fa-user-plus"></i> Inregistrare</a>
                    </li>';
            } else {
                echo '<li>
                        <a href="logare.php"><i class="fas fa-sign-in-alt"></i> Logare</a>
                    </li>
                    <li>
                        <a href="inregistrare.php"><i class="fas fa-user-plus"></i> Inregistrare</a>
                    </li>';  
            } 
            echo '  </ul>
                </li>'; 
            if (isset($_SESSION['utilId'])) {
                if ($rest === 'cos.php') {
                    echo '<li class="active">
                            <a href="cos.php"><i class="fas fa-shopping-cart"></i> Cos</a>
                        </li>';  
                } else {
                    echo '<li>
                            <a href="cos.php"><i class="fas fa-shopping-cart"></i> Cos</a>
                        </li>';
                }
            }
            if ($rest === 'transport.php') {
                echo '<li class="active">
                        <a href="transport.php"><i class="fa fa-truck"></i> Transport</a>
                    </li>';  
            } else {
                echo '<li>
                        <a href="transport.php"><i class="fa fa-truck"></i> Transport</a>
                    </li>';
            }
            if ($rest === 'info.php') {
                echo '<li class="active">
                        <a href="info.php"><i class="fa fa-info-circle"></i> Informații utile</a>
                    </li>';  
            } else {
                echo '<li>
                        <a href="info.php"><i class="fa fa-info-circle"></i> Informații utile</a>
                    </li>';
            }
            if ($rest === 'index.php#contact') {
                echo '<li class="active">
                    <a href="index.php#contact"><i class="fa fa-address-book"></i> Contact</a>
                </li>';  
            } else {
                echo '<li>
                    <a href="index.php#contact"><i class="fa fa-address-book"></i> Contact</a>
                </li>';
            }
            @endphp
            <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown"><a class="nav-link" href="{{ url('/products') }}">Control Panel</a></li>
                       <li class="nav-item dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                        
                    </ul>
            @php
            echo '</ul>';
            @endphp
        </nav>