<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Clientes </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    
        <div class="container">
        <h4>Nuevo Cliente</h4>
        <div class="row">
            <div class="col-sm-4 my-1">
                <form action="{{route('cliente.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre: </label>
                        <input type="text" clas="form-contro" name="nombre" required maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido: </label>
                        <input type="text" clas="form-contro" name="apellido" required maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion: </label>
                        <input type="text" clas="form-contro" name="direccion" required maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono: </label>
                        <input type="text" clas="form-contro" name="telefono" required maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" clas="form-contro" name="email" required maxlength="20">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <input type="reset" class="btn btn-default" value="Cancelar">
                        <a href="javascript:history.back()">Regresar al listado</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>