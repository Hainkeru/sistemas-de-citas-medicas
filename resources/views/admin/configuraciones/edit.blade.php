@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/paciente.css')}}">

<body>
    <div class="container-fluid">
        <form action="{{url('/admin/configuraciones/'.$configuracion->id)}}" method="POST" enctype="multipart/form-data" class="mx auto">
            @csrf
            @method('PUT')
            <h4 class=text-center>Modificar una configuracion</h4>
            <br>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Clinica/Hospital</label>
                        <input type="text" name="nombre" value="{{$configuracion->nombre}}" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="form-label">Direccion</label>
                        <input type="text" name="direccion" value="{{$configuracion->direccion}}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Logotipó</label>
                            <input type="file" id="file" name="logo" class="form-control">
                            <br>
                            <center>
                                <output id="list">
                                <img src="{{url('/storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                                </output>
                            </center>
                            <script>
                                function archivo(evt) {
                                    var files = evt.target.files; // FileList object
                                    //Obtenemos la imagen del campo "file".
                                    for (var i = 0, f; f = files[i]; i++) {
                                        //Solo admitimos imágenes.
                                        if (!f.type.match('image.*')) {
                                            continue;
                                        }
                                        var reader = new FileReader();
                                        reader.onload = (function(theFile) {
                                            return function(e) {
                                                // Insertamos la imagen.
                                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target
                                                    .result, '"width="60%" title="', escape(theFile.name), '"/>'
                                                ].join('');
                                            };
                                        })(f);
                                        reader.readAsDataURL(f);
                                    }
                                }
                                document.getElementById('file').addEventListener('change', archivo, false);
                            </script>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" value="{{$configuracion->correo}}" class="form-control" required>
                    @error('email')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="" class="form-label">telefono</label>
                    <input type="number" name="telefono" class="form-control" value="{{$configuracion->telefono}}" required>
                    @error('telefono')
                    <small style="color:red">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <button type="submit" class="btn btn-primary" name="enviar">Modificar</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form group">
                        <a href="{{url('admin/configuraciones')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
@endsection