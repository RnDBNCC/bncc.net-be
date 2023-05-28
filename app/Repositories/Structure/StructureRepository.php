<?php

namespace App\Repositories\Structure;

use LaravelEasyRepository\Repository;

interface StructureRepository extends Repository{

    public function createStructure($structureData);

    public function updateStructure($stuctureId, $structureData);

    public function deleteStructure($stuctureId);

    public function getStructureById($stuctureId);
}
