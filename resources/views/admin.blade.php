@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img src="/icons/encabezado_juegos.png" alt="" width="100%">
            <div class="card">
                <div class="card-header"><a href="{{ url('nuevoJuego') }}" class="btn btn-warning">Nuevo Juego</a></div>

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
                                        <a href="{{ url('/editaJuego/'.$dat->_id) }}" class="btn btn-info">Editar</a>
                                    </div>
                                    <div class="col">
                                        <form action="{{ url('/admin_juego/'.$dat->_id) }}" method="post" enctype="multipart/form-data" class="formEliminar">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" value="Borrar" class="btn btn-danger">
                                            <!-- <input type="submit" onclick="return confirm('¿Desea borrar el juego?')" value="Borrar" class="btn btn-danger"> -->
                                        </form>
                                    </div>
                                    <div class="col">
                                        <a href="#" class="btn btn-success">Ver</a>
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



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Se agrega la libreria de sweetalert2 -->

<script> // Se agrega el script para mostrar el mensaje de confirmacion de eliminacion
    (function(){
        'use strict'
        // Debemos de crear la clase formEliminar dentro del form del boton eliminar
        // Recordar que cada registro  a eliminar esta contenido en un form
        var forms = document.getElementsByClassName('formEliminar');
        Array.prototype.slice.call(forms)
            .forEach(function(form){
                form.addEventListener('submit', function(event){
                    event.preventDefault();
                    event.stopPropagation();
                    // Aqui se llama a la funcion de sweetalert2
                    Swal.fire({
                        title: '¿Estas seguro de eliminar este registro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirmar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire(
                                'Eliminado!',
                                'El registro ha sido eliminado exitosamente.',
                                'success'
                            );
                        }
                    })
                }, false)
            })
    })()
</script>
@endsection