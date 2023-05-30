<?php

namespace App\Repositories\Structure;

use LaravelEasyRepository\Repository;

interface StructureRepository extends Repository{

    public function createStructure($structureData);

    public function updateStructure($structureId, $structureData);

    public function deleteStructure($structureId);

    public function getStructureById($structureId);

    public function viewStructure();
}
