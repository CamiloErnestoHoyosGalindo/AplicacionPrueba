@extends('layouts.plantilla')

@section('content')
    <br>
    <h1 align="center" >Editar Ciudad {{$ciudad->name}}</h1>
    <form action="{{ route('adminCity.actualizar', $ciudad->cod)}}" method="POST">
        @method('PUT')
        @csrf

        @error('name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Es obligatorio ingresar el nombre de la ciudad
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Danger:"></button>
        </div>
        @enderror
        <input type="text" name="name" placeholder="Nombre ciudad" class="form-control mb-2" />
        <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary btn-block" type="submit">Editar</button>
        </div>
        
    </form>
@endsection