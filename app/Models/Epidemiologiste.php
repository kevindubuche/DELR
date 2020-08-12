<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Epidemiologiste
 * @package App\Models
 * @version August 12, 2020, 4:00 am UTC
 *
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $username
 * @property string $telephone
 * @property string $password
 * @property string $integer
 * @property string $image
 * @property integer $user_id
 */
class Epidemiologiste extends Model
{
    use SoftDeletes;

    public $table = 'epidemiologistes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'email',
        'username',
        'telephone',
        'sexe',
        'image',
        'user_id'
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
        'telephone' => 'string',
        'sexe' => 'integer',
        'image' => 'string',
        'user_id' => 'integer'
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
        'telephone' => 'required|string|max:191',
        'sexe' => 'required|integer',
        'user_id' => 'required|integer',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
