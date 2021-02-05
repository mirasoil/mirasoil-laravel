<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Smartself</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<!-- @if(Auth::guard('admin')->check())
    @include('navigation.admin-nav')
@elseif(Auth::guard('user')->check())
    @include('navigation.user-nav')
@endif -->
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--- Footer --->
    <footer>
        	<div class="footer-top">
		        <div class="container">
		        	<div class="row">
		        		<div class="col-md-3 footer-about wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
		        			<h3>About me</h3>
		        			<p>
		        				I am a self-taught programmer always looking for new and creative ideas to improve my everyday work.
		        			</p>
	                    </div>
		        		<div class="col-md-4 offset-md-1 footer-contact wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
		        			<h3>Contact</h3>
		                	<p><i class="fas fa-map-marker-alt"></i> Miraslau, Alba</p>
		                	<p><i class="fas fa-phone"></i> 0752336523</p>
		                	<a href="mailto:ispas_teodora@yahoo.com"><p><i class="fas fa-envelope"></i> Email</p></a>
	                    </div>
	                    <div class="col-md-4 footer-links wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
	                    	<div class="row">
	                    		<div class="col">
	                    			<h3>Links</h3>
	                    		</div>
	                    	</div>
	                    	<div class="row">
	                    		<div class="col-md-6">
	                    			<p><a class="scroll-link" href="/">Home</a></p>
	                    			<p><a href="/shop">Products</a></p>
	                    			<p><a href="#">Our clients</a></p>
	                    		</div>
	                    		<div class="col-md-6">
	                    			<p><a href="#">Plans &amp; pricing</a></p>
	                    			<p><a href="#">Affiliates</a></p>
	                    			<p><a href="#">Terms</a></p>
	                    		</div>
	                    	</div>
	                    </div>
		            </div>
		        </div>
	        </div>
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://www.facebook.com/ispas.teodora.9"> Ispas Teodora</a>
  </div>
        </footer>
</body>
</html>