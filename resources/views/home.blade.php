@extends('layouts.plantilla')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> </div>
                <br>
                <div class="col text-center">  
                    <a href="{{ route('adminCity')}}" class="btn btn-primary">Ciudades</a>  
                    <a href="{{ route('adminClient')}}" class="btn btn-primary">Clientes</a>  
                    
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
