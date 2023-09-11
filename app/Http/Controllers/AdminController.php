<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Symfony\Component\HttpFoundation\Response;
use Storage;

class AdminController extends Controller
{
    #Constructor para verificar que el usuario este autenticado y que sea el administrador
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin', ['only' => ['index']]); //middleware que verifica que solo el administrador pueda acceder a la ruta
    }

    #Mosrar todos los juegos
    public function index()
    {
        $games = Game::all(); // obtiene todos los juegos
        return view('admin', compact('games')); // retorna la vista admin con los juegos
    }

    #Mostrar formulario para crear un juego
    public function store(Request $request)
    {
        $game = new Game(); // crea un nuevo juego

        // asigna los valores del formulario
        if($imagen = $request->file('imagen')){ // verifica si se subio una imagen
            $rutaGuardarImg = 'imagen/'; // ruta donde se guardara la imagen
            $nombreImagen = date('YmdHis'). "." . $imagen->getClientOriginalExtension(); // asigna un nombre a la imagen
            $imagen->move($rutaGuardarImg, $nombreImagen); // guarda la imagen en la carpeta imagen
            $game->imagen = $nombreImagen; // asigna la imagen al juego
        }

        $game->titulo = $request->titulo;
        $game->descripcion = $request->descripcion; 
        $game->precio = $request->precio;
        $game->categoria = $request->categoria;
        $game->descuento = $request->descuento;

        $game->save(); // guarda el juego

        return redirect('admin'); // redirecciona a la ruta admin
    }

    #Mostrar formulario para editar un juego
    public function show($id)
    {
        $game = Game::find($id); // busca el juego por el id
        return view('admin_edita_juego', compact('game')); // retorna la vista admin_edita_juego con el juego
    }

    #Actualizar un juego
    public function update(Request $request, $id)
    {
        $game = Game::find($id); // busca el juego por el id

        // asigna los valores del formulario
        if($imagen = $request->file('imagen')){ // verifica si se subio una imagen
            if($game->imagen != ''){ // verifica si el juego ya tenia una imagen
                unlink(public_path('imagen/'.$game->imagen)); // elimina la imagen del juego
            }
            $rutaGuardarImg = 'imagen/';
            $nombreImagen = date('YmdHis'). "." . $imagen->getClientOriginalExtension(); // asigna un nombre a la imagen
            $imagen->move($rutaGuardarImg, $nombreImagen); // guarda la imagen en la carpeta imagen
            $game->imagen = $nombreImagen; // asigna la nueva imagen al juego
        }else{ // si no se subio una imagen
            unset($game->imagen); 
        }

        $game->titulo = $request->titulo; 
        $game->descripcion = $request->descripcion;
        $game->precio = $request->precio;
        $game->categoria = $request->categoria;
        $game->descuento = $request->descuento;

        $game->save(); // actualiza el juego

        return redirect('admin'); // redirecciona a la ruta admin
    }

    #Eliminar un juego
    public function destroy($id, Request $request)
    {
        $game = Game::find($id); // busca el juego por el id
        unlink(public_path('imagen/'.$game->imagen)); // elimina la imagen del juego de la carpeta imagen

        $game->delete(); // elimina el juego

        return redirect('admin'); // redirecciona a la ruta admin
    }
}
