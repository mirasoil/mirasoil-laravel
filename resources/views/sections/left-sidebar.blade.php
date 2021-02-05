<!--Left Sidebar Holder -->
<nav id="sidebar" class="active">
            <div class="sidebar-header">
                <h3><i class="fas fa-bars"></i> MENIU</h3>
            </div>
            @php
            $text=$_SERVER['PHP_SELF'];
            $rest = substr("$text", 1);
            echo '<ul class="list-unstyled components">';
            if ($rest === 'index.php') {
                echo '<li class="active">
                        <a href="index.php"><i class="fas fa-home"></i> Acasă</a>
                    </li>';  
            } else {
                echo '<li>
                        <a href="index.php"><i class="fas fa-home"></i> Acasă</a>
                    </li>';
            }
            if ($rest === 'about.php') {
                echo '<li class="active">
                        <a href="about.php"><i class="far fa-address-card"></i> Despre</a>
                    </li>';  
            } else {
                echo '<li>
                        <a href="about.php"><i class="far fa-address-card"></i> Despre</a>
                    </li>';
            }
            if ($rest === 'prelucrare.php') {
                echo '<li class="active">
                        <a href="prelucrare.php"><i class="fas fa-hand-holding-water"></i> Prelucrare</a>
                    </li>';  
            } else {
                echo '<li>
                        <a href="prelucrare.php"><i class="fas fa-hand-holding-water"></i> Prelucrare</a>
                    </li>';
            }
            if ($rest === 'produse.php') {
                echo '<li class="active"><!-- Link with dropdown items -->
                        <a class="dropdown-toggle" href="#homeSubmenu" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="homeSubmenu"><i class="fas fa-list-ol"></i> Produse</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="produs.php?codProdus=1">Ulei de lavandă</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=2">Hidrolat de lavandă</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=3">Săpun natural</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=4">Sirop</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=6">Buchete florale</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=5">Brichete</a>
                            </li>
                        </ul>
                    </li>';  
            } else {
                echo '<li><!-- Link with dropdown items -->
                        <a class="dropdown-toggle" href="#homeSubmenu" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="homeSubmenu"><i class="fas fa-list-ol"></i> Produse</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="produs.php?codProdus=1">Ulei de lavandă</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=2">Hidrolat de lavandă</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=3">Săpun natural</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=4">Sirop</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=6">Buchete florale</a>
                            </li>
                            <li>
                                <a href="produs.php?codProdus=5">Brichete</a>
                            </li>
                        </ul>
                    </li>'; 
            }
            if ($rest === 'produse.php') {
                echo '<li class="active">
                        <a href="produse.php"><i class="fas fa-store-alt"></i> Magazin</a>
                    </li>';  
            } else {
                echo '<li>
                        <a href="produse.php"><i class="fas fa-store-alt"></i> Magazin</a>
                    </li>';
            }
            echo '<li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-users"></i> Social</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="https://www.facebook.com/mirasoil16/"><i class="fab fa-facebook-square"></i>  Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/mirasoil16/"><i class="fab fa-instagram-square"></i> Instagram</a>
                        </li>
                        <li>
                            <a href="https://ro.pinterest.com/mirasoilproduction/boards/"><i class="fab fa-pinterest-square"></i> Pinterest</a>
                        </li>
                    </ul>
                </li>';
            echo '</ul>';
            @endphp
        </nav>