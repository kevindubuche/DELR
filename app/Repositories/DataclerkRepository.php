<?php

namespace App\Repositories;

use App\Models\Dataclerk;
use App\Repositories\BaseRepository;

/**
 * Class DataclerkRepository
 * @package App\Repositories
 * @version August 11, 2020, 3:51 pm UTC
*/

class DataclerkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'prenom',
        'email',
        'username',
        'password',
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
        return Dataclerk::class;
    }
}
