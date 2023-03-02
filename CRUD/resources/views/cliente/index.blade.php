<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h4>Gestion de Clientes
        </h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('cliente.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-1">
                            <a href="{{route('cliente.create')}}" class="btn btn-success">Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <form action="/delete-clientes" method="POST">
                        @csrf
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Dirección</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($clientes)<=0)
                                <tr>
                                    <td colspan="7">No hay apellido similares</td>
                                </tr>
                                @else
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="ids[{{ $cliente->id }}]" value="{{ $cliente->id }}">
                                        <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-warning btn-sm"> Editar </a>
                                    </td>
                                    <td>{{$cliente->id}}</td>
                                    <td>{{$cliente->nombre}}</td>
                                    <td>{{$cliente->apellido}}</td>
                                    <td>{{$cliente->direccion}}</td>
                                    <td>{{$cliente->telefono}}</td>
                                    <td>{{$cliente->email}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <input type="submit" value="Eliminar usuarios">
                    
                    {{$clientes->links()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>