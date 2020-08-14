<?php

namespace App\Repositories;

use App\Models\Contamine;
use App\Repositories\BaseRepository;

/**
 * Class ContamineRepository
 * @package App\Repositories
 * @version August 12, 2020, 2:17 pm UTC
*/

class ContamineRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Contamine::class;
    }
}
