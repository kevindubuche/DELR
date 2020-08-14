<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom','prenom', 'email', 'password','username','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function GetUser($role, $id){
        $dataclerk = User::join('dataclerks', 'dataclerks.user_id','=', 'users.id')
                    ->where('users.id',$id)
                    ->first();
      $epidemiologiste = User::join('epidemiologistes', 'epidemiologistes.user_id','=', 'users.id')
                   ->where('users.id',$id)
                   ->first();

        if ($role == 1){
            
            return $dataclerk;
        }
       
       return $epidemiologiste;
    }
}
