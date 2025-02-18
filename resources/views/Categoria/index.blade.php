<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sistema de gestion Comercial Uss</title>
</head>
<body>        
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Listado de Categorias <a class="btn btn-primary" href="{{route('categorias.create')}}">Nueva Categoria</a></h3>
                @if(Session::has('mensaje'))

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{Session::get('mensaje')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    {{-- <div class="alert alert-info alert-dismissible fade show mt-2">
                        <span class="alert-icon"><i class="fa fa-info"></i></span>
                        <span class="alert-text">{{Session::get('mensaje')}}</span>
                        <button class="close" data-dismiss="alert" aria-label="close" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}
                    
                @endif
                <form action="{{route('categorias.index')}}" method="GET">
                    <div class="input-group">
                        <input type="text" name="texto" class="form-control mt-2" value="{{$texto}}">
                        <div class="input-group-append">
                            <button class="btn btn-info ml-2" type="submit"><i class="fas fa-search"></i>Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Id</th>  
                            <th>Nombre</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($registros as $reg)
                        <tr>
                            <td></td>
                            <td>{{ $reg->id }}</td>
                            <td>{{ $reg->nombre }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center align-items-center height-100">
                    {{ $registros->appends(['texto' => $texto])}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

