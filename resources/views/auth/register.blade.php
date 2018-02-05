@extends('layouts.regis')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('tipoUsuario') ? ' has-error' : '' }}">
                            <label for="tipoUsuario" class="col-md-4 control-label">Tipo de Usuario</label>
                            <div class="col-md-6">
                                @if(Auth::user()->tipoUsuario == 'admin')
                                <select name="tipoUsuario" id="tipoUsuario" class="form-control">
                                    <option value="">Tipo de Usuario</option>
                                    <option value="admin">Administrador</option>
                                    <option value="revendedor">Revendedor</option>
                                    <option value="empresa">Administrador Empresa</option>
                                    <option value="empleado">Empleado</option>
                                </select>
                                @endif
                                @if(Auth::user()->tipoUsuario == 'revendedor')
                                <select name="tipoUsuario" id="tipoUsuario" class="form-control">
                                    <option value="">Tipo de Usuario</option>
                                    <option value="empresa">Administrador Empresa</option>
                                    <option value="empleado">Empleado</option>
                                </select>
                                @endif
                                @if(Auth::user()->tipoUsuario == 'empresa')
                                <select name="tipoUsuario" id="tipoUsuario" class="form-control">
                                    <option value="">Tipo de Usuario</option>
                                    <option value="empresa">Administrador Empresa</option>
                                    <option value="empleado">Empleado</option>
                                </select>
                                @endif
                                @if(Auth::user()->tipoUsuario == 'empleado')
                                <input type="hidden" name="tipoUsuario" value="empleado">
                                @endif
                                @if ($errors->has('tipoUsuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipoUsuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
