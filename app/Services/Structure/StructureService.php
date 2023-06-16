<?php

namespace App\Services\Structure;

use LaravelEasyRepository\BaseService;

interface StructureService extends BaseService{

    public function createStructure($request);

    public function updateStructure($request, $structureId);

    public function deleteStructure($structureId);

    public function getStructureById($structureId);

    public function viewStructure();

}
