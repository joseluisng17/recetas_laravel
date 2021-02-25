<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index()
    {

        //Mostrar las recetas por cantidad de votos
        //$votadas = Receta::has('likes', '>', 1)->get();
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        //obtener las recetas más nuevas
        //$nuevas = Receta::orderBy('created_at', 'DESC')->get();

        //otra forma de traer las recetas más nuevas
        $nuevas = Receta::latest()->take(5)->get();

        // Recetas por categoria
        //$mexicana = Receta::where('categoria_id', 1)->get();
        //$argentina = Receta::where('categoria_id', 2)->get();

        // Otra forma de traer las recetas
        $categorias = CategoriaReceta::all();

        // Agrupar las recetas por categoria
        $recetas = [];

        foreach($categorias as $categoria){
            $recetas[Str::slug( $categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id)->take(3)->get();
        }

        //return $recetas;
        
        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
