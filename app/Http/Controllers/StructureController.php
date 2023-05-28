<?php

namespace App\Http\Controllers;

use App\Http\Requests\StructureRequest;
use App\Services\Structure\StructureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    protected $structureService;

    public function __construct(StructureService $structureService)
    {
        $this->structureService = $structureService;
    }

    public function createStructure(StructureRequest $request) : JsonResponse{
        return $this->structureService->createStructure($request)->toJson();
    }

    public function updateStructure(Request $request, $structureId) : JsonResponse{
        return $this->structureService->updateStructure($request, $structureId)->toJson();
    }

    public function deleteStructure($structureId) :JsonResponse {
        return $this->structureService->deleteStructure($structureId)->toJson();
    }
}
