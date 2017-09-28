<?php

namespace Apoyo;

use Illuminate\Database\Eloquent\Model;

class entrega_almuerzo extends Model
{
    //
    protected $table = "entrega_almuerzo";

    protected $fillable = ['codigo','fecha'];

    public function users(){
    	return $this->belongsToMany('Apoyo\User');
    }
}
