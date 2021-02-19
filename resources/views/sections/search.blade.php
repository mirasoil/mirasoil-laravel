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
    if($value != ""){
        $.ajax({
            type : 'get',
            url : "{{URL::to('search')}}",
            data:{'search':$value},
            success:function(data){
                $('#suggestions').html(data); //this name should be a link to the product page or something
                console.log(data);
            }
        });
    }else {
        $('#suggestions').html("");
    }
})
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

