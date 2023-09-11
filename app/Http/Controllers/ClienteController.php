<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{
    #Constructor para verificar que el usuario este autenticado y que sea el cliente
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solocliente', ['only' => ['index']]); //middleware que verifica que solo el cliente pueda acceder a la ruta
    }

    #Mosrar todos los juegos
    public function index()
    {
        $games = Game::all(); // obtiene todos los juegos
        return view('cliente', compact('games')); // retorna la vista cliente con los juegos
    }

    public function terror()
    {
        $games = Game::all(); // obtiene todos los juegos
        return view('cliente_terror', compact('games')); // retorna la vista cliente con los juegos
    }

    public function accion()
    {
        $games = Game::all(); // obtiene todos los juegos
        return view('cliente_accion', compact('games')); // retorna la vista cliente con los juegos
    }

    public function aventura()
    {
        $games = Game::all(); // obtiene todos los juegos
        return view('cliente_aventura', compact('games')); // retorna la vista cliente con los juegos
    }

    public function puzzle()
    {
        $games = Game::all(); // obtiene todos los juegos
        return view('cliente_puzzle', compact('games')); // retorna la vista cliente con los juegos
    }

    public function biblioteca()
    {
        $games = Game::all(); // obtiene todos los juegos
        return view('cliente_biblioteca', compact('games')); // retorna la vista cliente con los juegos
    }

    public function watch($id) // funcion para ver el video del juego
    {
        $game = Game::find($id); // obtiene el juego con el id
        $gameTitulo = $game->titulo; // obtiene el titulo del juego
        $videoLists = $this->_videoLists($gameTitulo.' videojuego trailer oficial'); // busca el video con el titulo del juego
        $id = $videoLists->items[0]->id->videoId; // obtiene el id del video de youtube
        $singleVideo = $this->_singleVideo($id); // obtiene los detalles del video
        
        return view('cliente_watch', compact('singleVideo', 'videoLists', 'game')); // retorna la vista cliente_watch con los detalles del video
    }

    protected function _videoLists($keywords) // funcion para buscar el video de youtube
    {
        $part = 'snippet';
        $country = 'MX';
        $apiKey = config('services.youtube.api_key');
        $maxResults = 1;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video'; // Puedes seleccionar otro o todos      video,playlist,channel

        $url = "$youTubeEndPoint?part=$part&q=$keywords&type=$type&maxResults=$maxResults&key=$apiKey&regionCode=$country";
        
        $response = Http::get($url); // obtiene la respuesta de la url
        $results = json_decode($response); // decodifica la respuesta

        // Crearemos un archivo Json para ver nuestros resultados
        File::put(storage_path() . '\app\public\results.json', $response->body());

        return $results; // retorna los resultados
    }

    protected function _singleVideo($id) // funcion para obtener los detalles del video
    {   
        $apiKey = config('services.youtube.api_key');
        $part = 'snippet';
        
        $url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $id . '&key=' . $apiKey;
        
        $response = Http::get($url); // obtiene la respuesta de la url
        $results = json_decode($response); // decodifica la respuesta

        // Crearemos un archivo Json para ver los detalles de nuestro unico video
        File::put(storage_path() . '\app\public\single.json', $response->body());

        return $results; // retorna los resultados
    }
}
