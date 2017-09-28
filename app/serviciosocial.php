<?php

namespace Apoyo;

use Illuminate\Database\Eloquent\Model;

class serviciosocial extends Model
{

	protected $table = "serviciosocial";
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','descripcion'];

     public function users(){
        return $this->hasMany('Apoyo\User','Servi_id');
    }

    public function scopeServicio($query, $name){
        if(trim($name) != "")
        {
            $nom_ape = (\DB::raw("CONCAT(nombre, ' ', descripcion)"));
            $query->where($nom_ape, "LIKE", "%$name%" )-> orwhere('id', "LIKE", "%$name%");
        }
    }
}
