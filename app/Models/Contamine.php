<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
/**
 * Class Contamine
 * @package App\Models
 * @version August 12, 2020, 2:17 pm UTC
 *
 * @property string $nom
 * @property string $prenom
 * @property integer $sexe
 * @property string $commune
 * @property string $departement
 * @property string $adresse
 * @property string $institution
 * @property string $telephone
 */
class Contamine extends Model
{
    use SoftDeletes;

    public $table = 'contamines';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'prenom',
        'sexe',
        'commune',
        'departement',
        'adresse',
        'institution',
        'telephone',
        'created_by'
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
        'sexe' => 'integer',
        'commune' => 'string',
        'departement' => 'string',
        'adresse' => 'string',
        'institution' => 'string',
        'telephone' => 'string',
        'created_by' =>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required|string|max:191',
        'prenom' => 'required|string|max:191',
        'sexe' => 'required|integer',
        'commune' => 'required|string|max:191',
        'departement' => 'required|string|max:191',
        'adresse' => 'required|string|max:191',
        'institution' => 'required|string|max:191',
        'telephone' => 'required|string|max:191',
        'created_by' => 'required',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public  function GetUser($id){

        $user = User::where('users.id',$id)
           ->first();
       
       return $user;
    }


    
}
