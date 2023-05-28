<?php

namespace App\Services\Structure;

use LaravelEasyRepository\BaseService;

interface StructureService extends BaseService{

    public function createStructure($request);
}
