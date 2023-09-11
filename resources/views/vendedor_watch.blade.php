@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <img src="/icons/encabezado_juegos.png" alt="" width="100%"> -->
    <div class="card mb-12" style="width: 100%">
        <div class="row no-gutters">
            <img src="/imagen/{{ $game->imagen }}"height="350">
            
            <div class="card-body col-md-1 card_apiYT">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.youtube.com/embed/{{ $singleVideo->items[0]->id }}" width="500" height="350" frameborder="0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <h5>{{ $singleVideo->items[0]->snippet->title }}</h5>
                <p class="text-secondary">
                    Published at {{ date('d M Y', strtotime($singleVideo->items[0]->snippet->publishedAt)) }}
                </p>
            </div>
            <div class="col card_game_details">
                <div class="d-flex cont_buy">
                    <a href="#" class="btn btn-warning">Comprar</a>
                    <h5>${{ $game->precio }}.00</h5>
                </div>
                <h3 class="mb-3 title_game">{{ $game->titulo }}</h3>
                <h5>Descripción</h5>
                <p class="p_game_des">{{ $game->descripcion }}</p>
            </div>
        </div
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
@endsection