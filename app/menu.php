<?php

namespace Apoyo;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    //
    protected $table = "menu";
    protected $primaryKey = 'id';
    protected $fillable = ['sopa','plato_fuerte','jugo','postre','cantitotal','cantientregada','fecha'];

    public function scopeMenu($query, $name){
        if(trim($name) != "")
        {
            //$nom_ape = (\DB::raw("CONCAT(nombre, ' ', apellido)"));
            $query->where('sopa', "LIKE", "%$name%" )-> orwhere('id', "LIKE", "%$name%")-> orwhere('plato_fuerte', "LIKE", "%$name%")-> orwhere('jugo', "LIKE", "%$name%")-> orwhere('postre', "LIKE", "%$name%")-> orwhere('cantitotal', "LIKE", "%$name%")-> orwhere('fecha', "LIKE", "%$name%");
        }
    }
}
