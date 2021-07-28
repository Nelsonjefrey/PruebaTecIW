<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Prueba Tecnica</title>
</head>
<body>
<div class="container mr-auto ml-auto">
    <form  method="post" action="{{ url('/analizarTxt') }}" class="w-50 mt-5" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02" name="archivo">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <button type="submit">Subir</button>
    </form>
    <br><br>
    <h3>Usuarios Activos</h3>
    <table class="table table-bordered">
        <tr>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Codigo</th>
            <th>Opciones</th>
        </tr>
        @foreach($usuariosActivos as $user)
            <tr>
                <td>{{ $user->mail }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellido }}</td>
                <td>{{ $user->codigo }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">Edit</button>
                    <a  href="{{ url('/delete').'/'.$user->id }}" class="btn btn-danger">Delete</a>
                    <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/edit').'/'.$user->id }}" enctype="multipart/form-data" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <div class="row g-3">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{$user->mail}}" name="mail">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="{{$user->nombre}}" name="nombre">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row g-3">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{$user->apellido}}" name="apellido">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="{{$user->codigo}}" name="codigo">
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <h3>Usuarios Inactivos</h3>
    <table class="table table-bordered">
        <tr>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Codigo</th>
            <th>Opciones</th>
        </tr>
        @foreach($usuariosInactivos as $user)
            <tr>
                <td>{{ $user->mail }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellido }}</td>
                <td>{{ $user->codigo }}</td>
                <td>
                    <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
    <br><br>
    <h3>Usuarios En Proceso de Espera</h3>
    <table class="table table-bordered">
        <tr>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Codigo</th>
            <th>Opciones</th>
        </tr>
        @foreach($usuariosEspera as $user)
            <tr>
                <td>{{ $user->mail }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->apellido }}</td>
                <td>{{ $user->codigo }}</td>
                <td>
                    <button type="button" class="btn btn-warning">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>



