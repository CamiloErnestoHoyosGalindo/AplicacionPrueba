@extends('layouts.plantilla')

@section('content')
<div>
    <h1 align="center" >¡Ciudades!</h1>
    </div>

    <br>
    
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}
        </div>
    @endif

    <form action="{{ route('adminCity.agregar')}}" method="POST">
        @csrf

        @error('name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Es obligatorio ingresar el nombre de la ciudad
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Danger:"></button>
        </div>
        @enderror


        <input type="text" name="name" placeholder="Nombre ciudad" class="form-control mb-2" />

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
                <th scope="col">Ciudad</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listas as $ciudad)
                <tr>
                    <th scope="row">{{$ciudad->cod}}</th>
                    <td>{{$ciudad->name}}</td>
                    <td class=" d-flex justify-content-evenly">
                        <a href="{{ route('adminCity.editar', $ciudad)}}" class="btn btn-warning btn-sm ">Editar</a>

                        <form action="{{ route('adminCity.eliminar', $ciudad)}}" method="POST" class="d-inline">
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