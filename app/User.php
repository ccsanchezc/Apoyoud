<?php

namespace Apoyo;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Apoyo\Notifications\MyResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
   protected $table = "users";
     protected $primaryKey = 'codigo';
     protected $fillable = [
        'codigo', 'nombre', 'apellido' ,'email', 'password', 'telefono', 'direccion', 'carrera', 'type','sub_id','Servi_id',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }



   protected $appends = ['cantidad'] ;

    public  function getCantidadAttribute()
    {
        return $this->attributes['cantidad'];
    }

    public   function setCantidad($value)
    {
       $this->cantidad = $value;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setPasswordAttribute($valor){
       if(!empty($valor)){
           $this->attributes['password'] = \Hash::make($valor);
        }
   }

    public function entregas_almuerzos(){
        return $this->hasMany('Apoyo\entrega_almuerzo','codigo');
    }

    public function servi_usuario(){
        return $this->belongsTo('Apoyo\serviciosocial','Servi_id');
    }

    public function sub_usuario(){
        return $this->belongsTo('Apoyo\subsidio','sub_id');
    }
    public function admin(){

        return $this->type === 'admin';
    }
    public function estudiante(){
     return $this->type === 'estudiante';   
    }
    public function supervisor(){
     return $this->type === 'supervisor';   
    }
     public  function servicios(){
     return $this->Servi_id === NULL;   
    }
     public  function subsidio(){
     return $this->sub_id === NULL;   
    }

     public function scopeName($query, $name){
        if(trim($name) != "")
        {
            $nom_ape = (\DB::raw("CONCAT(nombre, ' ', apellido)"));
            $query->where($nom_ape, "LIKE", "%$name%" )-> orwhere('codigo', "LIKE", "%$name%");
        }
    }
}
