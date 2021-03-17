@extends('layouts.master')
@section('content')
<div class="container">
<h1 class="text-center">{{ $user->name }}</h1>
<h3 class="text-center">Modificări</h3>
<div class="panel panel-default" style="padding:50px">
        <div class="panel-body">
            <!---exista inregistrari in tabelul task --->
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Error:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
            <!--populez campurile formularului cu datele aferente din tabela tbl_user pe care le pot modifica-->
            {!! Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
            <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Prenume') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="firstname" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autocomplete="current-firstname" value="{{ $user->firstname }}">

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Nume') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="lastname" class="form-control @error('lastname') is-invalid @enderror" name="lastname" required autocomplete="current-lastname" value="{{ $user->lastname }}">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefon') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="current-phone" value="{{ $user->phone }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Adresa') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="current-address" value="{{ $user->address }}">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="county" class="col-md-4 col-form-label text-md-right">{{ __('Judet') }}</label>

                            <div class="col-md-6">
                                <input id="county" type="county" class="form-control @error('county') is-invalid @enderror" name="county" required autocomplete="current-county" value="{{ $user->county }}">

                                @error('county')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="locality" class="col-md-4 col-form-label text-md-right">{{ __('Localitate') }}</label>

                            <div class="col-md-6">
                                <input id="locality" type="locality" class="form-control @error('locality') is-invalid @enderror" name="locality" required autocomplete="current-locality" value="{{ $user->locality }}">

                                @error('locality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Cod Postal') }}</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="zipcode" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" required autocomplete="current-zipcode" value="{{ $user->zipcode }}">

                                @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

        <div class="form-group">
                <input type="submit" value="Salvează" class="btn btn-info">
                <a href="{{route('users', app()->getLocale()) }}" class="btn btn-danger">Renunță</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
<!---populam campurile pe baza routelor
prin product update cand da click pe modificare se transmite id-ul in controller care va insera in baza de date datele
la modificare metoda e PATCH ca se suprapun 2 metode din controller--->