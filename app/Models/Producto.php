<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table = 'tabla01';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nombre', 'marca', 'precio', 'cantidad','slug'];

    use HasFactory;
    

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setIdAttribute($value){
        $this->attributes['id'] = strtoupper($value);
    }

    public function getIdAttribute($value){
        return strtoupper($value);
    }

    public function setNombreAttribute($value){
        $this->attributes['nombre'] = strtolower($value);
    }
    
    public function getNombreAttribute($value){
        return ucfirst($value);
    }

    public function setMarcaAttribute($value){
        $this->attributes['marca'] = strtolower($value);
    }

    public function getMarcaAttribute($value){
        return ucwords($value);
    }

}
