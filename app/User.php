<?php

namespace App;
    use Caffeinated\Shinobi\Traits\ShinobiTrait;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use ShinobiTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */



    protected $table='usuario';
    protected $primaryKey='id';

    public $timestamps=false;


    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }

     
    public function roles(){
        return $this->belongsToMany('\Caffeinated\Shinobi\Models\Role')->withTimestamps();
    }

    public function scopeBusqueda($query,$afiliado,$dato="")
    {
        if($afiliado==0){ 
            $resultado= $query->where('name','like','%'.$dato.'%')
            ;
        }
        else{
            $resultado = $query->where('name','like','%'.$dato.'%')
            ->whereHas("roles",function($query) use ($afiliado,$dato)
                {
                $query->rol($afiliado);
                //$query->where('name','like','%'.$dato.'%');

                });
        }                     
        return  $resultado;
    }
    
    public function scopeName($query,$name)
    {
        if(trim($name) != "")
        {
            $query->where('name','LIKE','%'.$name.'%');
        }
    }
}
