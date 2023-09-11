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
                    <div class="col container_games_biblioteca">
                        <h3 class="text-center mb-5">Biblioteca</h3>
                        <div class="row">
                            @foreach($games as $dat) <!-- Aqui se recibe la variable $courses que se envia desde el CourseController.php -->
                                <a href="{{ route('watch', $dat->_id) }}" class="col-md-5 card_game_cont mb-5">
                                    <img src="/imagen/{{ $dat->imagen }}" alt="" width="100%" height="140px" class="center-block mb-3 image_game">
                                    <h3 class="mb-3 title_game">{{ $dat->titulo }}</h3>
                                    <p class="btn btn-warning col-md-10 price_game">${{ $dat->precio }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-5 card_promos_games">
                        <h3 class="text-center mb-5 txt_descuentos">Mis Juegos</h3>

                        <div class="row row_content">
                            @foreach($games as $dat) <!-- Aqui se recibe la variable $courses que se envia desde el CourseController.php -->
                                @if($dat->descuento == 20)
                                    <div class="col-md-5 card_Mygame_cont mb-2">
                                        <i class="fa-solid fa-circle-check" style="color: #00bd52;"></i>
                                        <img src="/imagen/{{ $dat->imagen }}" alt="" width="90%" height="120px" class="center-block image_game">
                                        <p class="title_game_promo">{{ $dat->titulo }}</p>
                                        <p class="btn btn-success price_game mb-5">Download <i class="fa-solid fa-cloud-arrow-down"></i></p>
                                    </div>
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