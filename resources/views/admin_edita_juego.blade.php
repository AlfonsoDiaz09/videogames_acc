@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar Juego</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ url('admin_juego/'.$game->_id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="form-group">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" name="imagen" id="imagen" value="{{ $game->imagen }}">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 mt-5 mx-7">
                                    <img src="/imagen/{{ $game->imagen }}" id="imagenSeleccionada" style="max-height: 100px">
                                </div>
                                <div class="row grid grid-cols-1 mt-5 mx-7">
                                    <div class="col-md-4"></div>
                                    <div class="form-group">
                                        <label for="titulo" class="form-label">Titulo</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $game->titulo }}">
                                    </div>
                                </div>
                                <div class="row">  
                                    <div class="col-md-4"></div> 
                                    <div class="form-group"> 
                                        <label for="descripcion" class="form-label">Descripcion</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $game->descripcion }}">
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-md-4"></div>
                                    <div class="form-group">
                                        <label for="precio" class="form-label">Precio</label>
                                        <input type="number" class="form-control" name="precio" id="precio" value="{{ $game->precio }}">
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-md-4"></div>
                                    <div class="form-group">
                                        <label for="categoria" class="form-label">Categoria</label>
                                        <select name="categoria" id="categoria" class="form-control" required autocomplete="categoria">
                                            <option value="{{ $game->categoria }}" selected>{{ $game->categoria }}</option>
                                            @if($game->categoria != "Terror")
                                                <option value="Terror">Terror</option>
                                            @endif
                                            @if($game->categoria != "Accion")
                                                <option value="Accion">Accion</option>
                                            @endif
                                            @if($game->categoria != "Aventura")
                                                <option value="Aventura">Aventura</option>
                                            @endif
                                            @if($game->categoria != "Puzzle")
                                                <option value="Puzzle">Puzzle</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-md-4"></div>
                                    <div class="form-group">
                                        <label for="descuento" class="form-label">Descuento</label>
                                        <select name="descuento" id="descuento" class="form-control" required autocomplete="usertype">
                                            <option value="{{ $game->descuento }}" selected>{{ $game->descuento }}%</option>
                                            @if($game->descuento != "0")
                                                <option value="0">0%</option>
                                            @endif
                                            @if($game->descuento != "20")
                                                <option value="20">20%</option>
                                            @endif
                                            @if($game->descuento != "30")
                                                <option value="30">30%</option>
                                            @endif
                                            @if($game->descuento != "50")
                                                <option value="50">50%</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 help-text"></div>
                            <div class="row">    
                                <div class="col-md-4"></div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Actualizar">
                                    <a href="{{ url('admin') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
<script>
    $(document).ready(function(e){
        $('#imagen').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection