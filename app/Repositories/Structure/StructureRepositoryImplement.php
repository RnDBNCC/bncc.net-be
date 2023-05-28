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
    protected $structure;

    public function __construct(Structure $structure)
    {
        $this->structure = $structure;
    }

    public function createStructure($structureData)
    {
        return $this->structure->create($structureData);
    }

    public function updateStructure($stuctureId, $structureData)
    {
        return $this->structure->findOrFail($stuctureId)->update($structureData);
    }

    public function deleteStructure($stuctureId)
    {
        return $this->structure->destroy($stuctureId);
    }

    public function getStructureById($stuctureId)
    {
        return $this->structure->findOrFail($stuctureId);
    }
}
