<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

    // campos que se agregaran
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];

    // Obtiene la categoria de la receta via FK
    public function categoria()
    {
        // traer toda la relación con el catgoria_id de la tabla CategoriaRecetas
        return $this->belongsTo(CategoriaReceta::class);
    }

    //obtener la información del usuario via FK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id'); // FK de esta tabla, indicar en que columna de la tabla se esta guardando la relación
    }

    // Likes que ha recibido una receta
    public function likes()
    {
        // Relación de muchos a muchos
        return $this->belongsToMany(User::class, 'likes_receta'); // le estamos diciendo en donde se va guardar con el likes_receta
    }
}
