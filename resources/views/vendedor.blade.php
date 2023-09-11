@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img src="/icons/encabezado_juegos.png" alt="" width="100%">
            <div class="card">
                <div class="card-header"><a href="{{ url('nuevoJuegoV') }}" class="btn btn-warning">Nuevo Juego</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @foreach($games as $dat) <!-- Aqui se recibe la variable $courses que se envia desde el CourseController.php -->
                        <div class="col-md-4">
                            <div class="card mt-4">
                                <div class="card-header text-center">
                                    <img src="/imagen/{{ $dat->imagen }}" alt="" width="100%" height="150px" class="center-block">
                                    <h3>{{ $dat->titulo }}</h3>
                                </div>
                                <div class="card-body">
                                    <p>Descripción: {{ $dat->descripcion }}</p>
                                    <p>Precio: ${{ $dat->precio }} MXN</p>
                                    <p>Categoria: {{ $dat->categoria }}</p>
                                    <p>Descuento: {{ $dat->descuento }}%</p>
                                </div>
                                <div class="card-footer row">
                                    <div class="col">
                                        <a href="{{ route('watchV', $dat->_id) }}" class="btn btn-success">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection