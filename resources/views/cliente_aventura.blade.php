@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img src="/icons/encabezado_juegos.png" alt="" width="100%">
            <div class="card">
                <div class="card-body row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card_categorias col-md-2">
                        <h3 class="txt_categoria">Categorias</h3>
                        <ul class="list_categori">
                            <li>
                                <a href="/cliente">TODOS</a>
                            </li>
                            <li>
                                <a href="/terror">Terror</a>
                            </li>
                            <li>
                                <a href="/accion">Acción</a>
                            </li>
                            <li>
                                <a href="/aventura">Aventura</a>
                            </li>
                            <li>
                                <a href="/puzzle">Puzzle</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col container_games_categoria">
                        <h3 class="text-center mb-5">Muestras</h3>
                        <div class="row">
                            @foreach($games as $dat) <!-- Aqui se recibe la variable $courses que se envia desde el CourseController.php -->
                                @if($dat->descuento == 0 && $dat->categoria == "Aventura")
                                    <a href="{{ route('watch', $dat->_id) }}" class="col-md-3 card_game_cont mb-5">
                                        <img src="/imagen/{{ $dat->imagen }}" alt="" width="100%" height="140px" class="center-block mb-3 image_game">
                                        <h3 class="mb-3 title_game">{{ $dat->titulo }}</h3>
                                        <p class="description_game">{{ $dat->descripcion }}</p>
                                        <p class="btn btn-warning col-md-10 price_game">${{ $dat->precio }}</p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 card_promos_games">
                        <h3 class="text-center mb-5 txt_descuentos">Descuentos</h3>

                        <img src="/icons/descuento20.png" alt="" width="50%">
                        <div class="row">
                            @foreach($games as $dat) <!-- Aqui se recibe la variable $courses que se envia desde el CourseController.php -->
                                @if($dat->descuento == 20 && $dat->categoria == "Aventura")
                                    <a href="{{ route('watch', $dat->_id) }}" class="col-md-5 card_game_cont mb-2">
                                        <img src="/imagen/{{ $dat->imagen }}" alt="" width="100%" height="70px" class="center-block image_game">
                                        <p class="title_game_promo">{{ $dat->titulo }}</p>
                                        <p class="btn btn-warning price_game">${{ $dat->precio }}</p>
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <img src="/icons/descuento30.png" alt="" width="50%">
                        <div class="row">
                            @foreach($games as $dat) <!-- Aqui se recibe la variable $courses que se envia desde el CourseController.php -->
                                @if($dat->descuento == 30 && $dat->categoria == "Aventura")
                                    <a href="{{ route('watch', $dat->_id) }}" class="col-md-5 card_game_cont mb-2">
                                        <img src="/imagen/{{ $dat->imagen }}" alt="" width="100%" height="70px" class="center-block image_game">
                                        <p class="title_game_promo">{{ $dat->titulo }}</p>
                                        <p class="btn btn-warning price_game">${{ $dat->precio }}</p>
                                    </a>
                                @endif
                            @endforeach
                        </div>

                        <img src="/icons/descuento50.png" alt="" width="50%">
                        <div class="row">
                            @foreach($games as $dat) <!-- Aqui se recibe la variable $courses que se envia desde el CourseController.php -->
                                @if($dat->descuento == 50 && $dat->categoria == "Aventura")
                                    <a href="{{ route('watch', $dat->_id) }}" class="col-md-5 card_game_cont mb-2">
                                        <img src="/imagen/{{ $dat->imagen }}" alt="" width="100%" height="70px" class="center-block image_game">
                                        <p class="title_game_promo">{{ $dat->titulo }}</p>
                                        <p class="btn btn-warning price_game">${{ $dat->precio }}</p>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection