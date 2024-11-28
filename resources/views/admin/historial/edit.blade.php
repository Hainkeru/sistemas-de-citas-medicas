@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="{{ asset ('/paciente.css')}}">

<body>
    <div class="container-fluid">
        <form action="{{url('/admin/historial/'.$historial->id)}}" method="POST">
            @csrf
            @method('PUT')
            <h4 class=text-center>Registrar un nuevo historial</h4>
            <br>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Paciente</label>
                        <select name="paciente_id" id="" class="form-control">
                            @foreach($pacientes as $paciente)
                            <option value="{{$paciente->id}}" {{$historial->paciente_id == $paciente->id ? 'selected': ''}}>{{$paciente->apellidos." ".$paciente->nombres}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Fecha visita</label>
                        <input type="date" value="{{$historial->fecha_visita}}" name="fecha_visita" class="form-control">
                    </div>


                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Descripcion de la cita</label>
                        <textarea name="detalle" class="form-control" id="editor" cols="30" , rows="100" style="width: 100%; height: 500px">{{$historial->details}}</textarea>

                        <script type="importmap">
                            {
                            "imports": {
                                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
                            }
                        }
                        </script>

                        <script type="module">
                            import {
                                ClassicEditor,
                                Essentials,
                                Bold,
                                Italic,
                                Font,
                                Paragraph
                            } from 'ckeditor5';

                            ClassicEditor
                                .create(document.querySelector('#editor'), {
                                    plugins: [Essentials, Bold, Italic, Font, Paragraph],
                                    toolbar: [
                                        'undo', 'redo', '|', 'bold', 'italic', '|',
                                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                                    ]
                                })
                                .then( /* ... */ )
                                .catch( /* ... */ );
                        </script>


                    </div>
                </div>
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
                        <a href="{{url('admin/historial')}}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</body>
@endsection