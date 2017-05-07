@extends('layouts.app')

@section('content')
<link href="css/tela_login.css" rel="stylesheet">
<div class="module form-module margin-top-30 " >
  <div class="form">
    <h2>Login</h2>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <input placeholder="E-mail" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <input  placeholder="Senha" id="password" type="password" class="form-control" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <button type="submit" class="btn btn-primary btn-block"> Entrar</button>
    </form>
  </div>
  <div class="cta"><a href="/forgot">Esqueceu sua senha?</a></div>
</div>

@endsection
