@extends('layouts.plantilla')
    @section('contenido')
        <div class="container mt-3">
            <div class="card">
                <div class="card-header" >
                    <h2 class="text-primary text-center">@lang('main.categories')</h2>
                    <div class="text-center">
                        <a class="btn btn-success btn-center" href="{{route('productos.create')}}">@lang('main.new')</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('mensaje'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{Session::get('mensaje')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                    @endif

                    @if(Session::has('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{Session::get('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                    @endif
                    
                    <form action="{{route('productos.index')}}" method="GET">
                        <div class="input-group">
                            <input type="text" name="texto" placeholder="Categoria" class="form-control mt-2" value="{{$texto}} ">
                            <div class="input-group-append">
                                <button class="btn btn-primary ml-2" type="submit"><i class="fas fa-search"></i>@lang('main.search')</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-3" >
                        <div class="col-lg-12 table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Id</th>  
                                        <th>Codigo</th>  
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Categoria</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    
                                    @foreach ($categorias as $cat && $categorias as cat)
                                    <tr>
                                        <td>
                                            <a href="{{route('productos.edit',$pro->id)}}" class="btn btn-warning btm-sm">@lang('main.edit')</a>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-eliminar-{{$pro->id}}">@lang('main.delete')</button>
                                        </td>
                                        <td>{{ $pro->id }}</td>
                                        <td>{{ $pro->codigo}}</td>
                                        <td>{{ $pro->nombre}}</td>
                                        <td>{{ $pro->descripcion}}</td>
                                        <td>{{ $pro->precio}}</td>
                                        @if ($cat->id == $pro->categoria_id)
                                            
                                        <td>{{ $cat->nombre}}</td>
                                        @endif
                                        
                                    </tr>
                                    @endforeach
                                    {{-- @include('Categoria.delete') --}}
                                    
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center align-items-center height-100">
                                {{ $registros->appends(['texto' => $texto])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
