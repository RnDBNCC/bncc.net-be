<?php

namespace App\Repositories\Structure;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Structure;

class StructureRepositoryImplement extends Eloquent implements StructureRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Structure $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}
