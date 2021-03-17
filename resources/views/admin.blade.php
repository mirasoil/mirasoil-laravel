@extends('layouts.master')
@section('title')
<title>Admin - Mirasoil</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi boss!
                </div>
            </div>
        </div>
    </div>
</div>
@for ($i = 0; $i < 23; $i++)
    <br>
@endfor
@endsection