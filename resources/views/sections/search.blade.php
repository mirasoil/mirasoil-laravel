<div class="input-group justify-content-center">
    <span><a href="/"><img src="{{URL::asset('/img/Logo-mirasoil.png')}}" alt="Logo"  width="100"></a></span> 
    <div class="form-outline">
        <input type="search" id="search" class="form-control my-4" placeholder="Caută produs" />
        <span id="suggestions"></span>
        <span id="suggestions"></span>
        <span id="suggestions"></span>
    </div>
    <button type="button" class="btn btn-primary mt-4" style="height:38px;">
        <i class="fas fa-search"></i>
    </button>
</div>

<script type="text/javascript">
$('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
        type : 'get',
        url : "{{URL::to('search')}}",
        data:{'search':$value},
        success:function(data){
            $('#suggestions').html(data); //this name should be a link to the product page or something
            console.log(data);
        }
    });
})
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


 <!-- <div class="col-lg-4 col-md-5 col-sm-3">
    <form class="navbar-form" id="theSearchForm" name="theSearchForm" role="search" method="get" action="yoursearchfilescriptgoeshere">
        <div class="input-group">
            <input type="text"  class="form-control autocomplete" placeholder="Search">
            <div class="input-group-btn">
                <a class="btn btn-default" href="javascript:document.theSearchForm.submit();"><i class="glyphicon glyphicon-search"></i></a>

            </div>
<script>

$(function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
   $(".autocomplete").autocomplete({
    source: availableTags
  });
  });
</script> -->
