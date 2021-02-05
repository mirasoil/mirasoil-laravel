@php 
    session_start();
    if (isset($_SESSION['currentSessionUrl'])) {
      $_SESSION['previousSessionUrl'] = $_SESSION['currentSessionUrl'];
    }
    $_SESSION['currentSessionUrl'] = $_SERVER['REQUEST_URI'];
    
    @endphp
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="navbar-btn active">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <!-- Logo -->
        <div class="d-flex justify-content-center">
            <span><a href="index.php"><img class="logo" src="img/Logo-mirasoil.png" height="100px"></a></span>
        </div>
        <div class="butonDreapta">
        <button type="button" id="sidebarCollapseRight" class="navbar-btn d-inline-block ml-auto active">
          <span>
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
        </button>
      </div>
    </div>
</nav>
