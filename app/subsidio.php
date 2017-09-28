<?php

namespace Apoyo;

use Illuminate\Database\Eloquent\Model;

class subsidio extends Model
{
    //

	protected $table = 'subsidio';
	protected $primaryKey = 'id';
    protected $fillable = ['descripcion','type'];

     public function users(){
        return $this->hasMany('Apoyo\User','sub_id');
    }

    public function scopeSubsi($query, $name){
        if(trim($name) != "")
        {
            $nom_ape = (\DB::raw("CONCAT(type, ' ', descripcion)"));
            $query->where($nom_ape, "LIKE", "%$name%" )-> orwhere('id', "LIKE", "%$name%");
        }
    }
}
