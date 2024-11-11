@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/secretaria.css')}}">

<body>
    <div class="container-fluid">
        <form action="{{url('/admin/secretarias/'.$secretaria->id)}}" method="POST" class="mx auto">
            @csrf
            @method('PUT')
            <h4 class=text-center>Modificar secretaria/o {{$secretaria->nombres}} {{$secretaria->apellidos}}</h4>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Nombres</label>
                        <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Apellidos</label>
                        <input type="text" value="{{$secretaria->apellidos}}" name="apellidos" class="form-control" required>
                        @error('apellidos')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">CC</label>
                        <input type="text" value="{{$secretaria->cc}}" name="cc" class="form-control">
                        @error('cc')
                        <small style="color:red">{{$message}}</small>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" value="{{$secretaria->fecha_nacimiento}}" class="form-control" required>
                    @error('fecha_nacimiento')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" value="{{$secretaria->user->email}}" class="form-control" required>
                    @error('email')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">Celular</label>
                    <input type="text" name="celular" value="{{$secretaria->celular}}" class="form-control" required>
                    @error('celular')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Direccion</label>
                <input type="text" name="direccion" value="{{$secretaria->direccion}}" class="form-control" required>
                @error('direccion')
                <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" >
                @error('password')
                <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" >
                @error('password_confirmation')
                <small style="color:red">{{$message}}</small>
                @enderror
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <button type="submit" class="btn btn-primary" name="enviar">Actualizar</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/secretarias')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
@endsection