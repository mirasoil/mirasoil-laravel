@extends('layouts.master')
@section('content')
<div class="container">
<h1 class="text-center">Users Control Panel</h1>
@if ($message = Session::get('success'))
 <div class="alert alert-success"> <!--- mesaje de succes pt insert delete ---->
    <p>{{ $message }}</p>
 </div>
 @endif
 <div class="panel panel-default" style="padding:50px">
    <div class="panel-body">
        <!-- <div class="form-group">
            <div class="pull-right">
                <a href="/products/create" class="btn btn-info">Adaugă produs</a>
            </div>
        </div> -->
        <!---Capul de tabel care ramane mereu la fel, nu depinde de foreach--->
        <table class="table table-bordered table-stripped">
        <tr>
            <th>Id</th>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Judet</th>
            <th>Acțiuni</th>
        </tr>
        @if(count($users) > 0)
            @foreach ($users as $key =>$user)
            <tr>
                <div class="d-none">{{ ++$i }}</div>
                <td>{{$user->id}}</td>
                <td><a href="{{ route('user.show',$user->id) }}" style="text-decoration:none;color:gray;font-size:18px;"><strong>{{ $user->firstname }}</strong></a></td>
                <td class="text-center"><p>{{ $user->lastname }}</p></td>
                <td class="text-center"><p>{{ $user->email }}</p></td>
                <td class="text-center"><p>{{ $user->phone }}</p></td>
                <td class="text-center"><p>{{ $user->county }}</p></td>
                <td class="text-center">
                    <a class="btn btn-success m-2" href="{{ route('user.show',$user->id) }}">Detalii</a><br>
                    <a class="btn btn-primary m-2" href="{{ route('user.edit',$user->id) }}">Modifică</a><br>
                    {{ Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) }}   <!--se activeaza metoda destroy din ProductController-->
                    {{ Form::submit('Șterge', ['class' => 'btn btn-danger m-2']) }} <!---metoda delete din ProductController functia destroy---->
                    {{ Form::close() }}
                </td>
            </tr>
             @endforeach
        @else
            <tr>
                <td colspan="4">Nu există utilizatori în baza de date!</td>
            </tr>
        @endif
        </table>
        <div class="float-right">{{$users->render()}}</div><br>
    </div>
 </div>
</div>
@endsection