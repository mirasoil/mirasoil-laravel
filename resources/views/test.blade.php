@extends('layouts.master')
@section('content')
<section id="animatie">
    <div class="animated-text">
        <span class="animation-text">M</span>
        <span class="animation-text">I</span>
        <span class="animation-text">R</span>
        <span class="animation-text">A</span>
        <span class="animation-text">S</span>
        <span class="animation-text">O</span>
        <span class="animation-text">I</span>
        <span class="animation-text">L</span>
    </div>
</section>
@for ($i = 0; $i < 30; $i++)
    <br>
@endfor
@endsection