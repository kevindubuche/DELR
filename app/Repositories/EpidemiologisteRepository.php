<?php

namespace App\Repositories;

use App\Models\Epidemiologiste;
use App\Repositories\BaseRepository;

/**
 * Class EpidemiologisteRepository
 * @package App\Repositories
 * @version August 12, 2020, 4:00 am UTC
*/

class EpidemiologisteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Epidemiologiste::class;
    }
}
