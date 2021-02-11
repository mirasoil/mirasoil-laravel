
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="navbar-btn active">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <!-- Logo -->
        <!-- <div class="d-flex justify-content-center">
            <span><a href="/"><img src="{{URL::asset('/img/Logo-mirasoil.png')}}" alt="Logo"  width="100"></a></span> 
        </div>  -->
        @include('sections.search') 
        <div class="butonDreapta">
          <button type="button" id="sidebarCollapseRight" class="navbar-btn d-inline-block ml-auto active">
            <span>
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </button>
      </div>
    </div>
</nav>