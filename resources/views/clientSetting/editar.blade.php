@extends('layouts.plantilla')

@section('content')
    <br>
    <h1 align="center" >Editar Cliente {{$cliente->name}}</h1>
    <form action="{{ route('adminClient.actualizar', $cliente->cod)}}" method="POST">
        @method('PUT')
        @csrf

        @error('city')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Es obligatorio ingresar el nombre de la ciudad a la que se mudo el cliente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Danger:"></button>
        </div>
        @enderror
        <input type="text" name="city" placeholder="Nombre ciudad" class="form-control mb-2" />
        <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary btn-block" type="submit">Editar</button>
        </div>
        
    </form>
@endsection