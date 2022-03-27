@extends('layouts.plantilla')

@section('content')
<div>
    <br>
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar clientes segun ciudad" aria-label="Search">
                <div class="d-grid gap-2">
                    <button class="btn btn-navbar btn-primary" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    </button>
                </div>
            </input>
        </div>
    </form>   
    <h1 align="center" >¡Clientes!</h1>
    </div>

    <br>
    
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif

    <form action="{{ route('adminClient.agregar')}}" method="POST">
        @csrf

        @error('name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Es obligatorio ingresar el nombre de la cliente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Danger:"></button>
        </div>
        @enderror


        <input type="text" name="name" placeholder="Nombre cliente" class="form-control mb-2" />

        <div class="d-grid gap-2">
            <button class="btn btn-primary btn-block" type="submit">Agregar</button>
        </div>
       
    </form>

    <br>

    <div class="px-2" >
        <table class="table table-dark table-striped table-bordered border-primary">
            <thead>
                <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ciudad</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listas as $cliente)
                <tr>
                    <th scope="row">{{$cliente->cod}}</th>
                    <td>{{$cliente->name}}</td>
                    <td>{{$cliente->city}}</td>
                    <td class=" d-flex justify-content-evenly">
                        <a href="{{ route('adminClient.editar', $cliente)}}" class="btn btn-warning btn-sm ">Editar</a>

                        <form action="{{ route('adminClient.eliminar', $cliente)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf

                            <button class="btn btn-danger btn-sm " type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <ul class="pagination justify-content-center">
        {{ $listas->links('pagination::bootstrap-4') }}    
    </ul>
    
@endsection