<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dataclerk
 * @package App\Models
 * @version August 11, 2020, 3:51 pm UTC
 *
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $role
 * @property integer $user_id
 */
class Dataclerk extends Model
{
    use SoftDeletes;

    public $table = 'dataclerks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'email',
        'username',
        'user_id',
        'sexe',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'email' => 'string',
        'username' => 'string',
        'sexe' => 'integer',
        'user_id' => 'integer',
        'image' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:191',
        'prenom' => 'required|string|max:191',
        'email' => 'required|string|max:191',
        'username' => 'required|string|max:191',
        'user_id' => 'required|integer',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
