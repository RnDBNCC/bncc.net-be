<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoryRequest;
use App\Services\History\HistoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    protected $historyService;

    public function __construct(HistoryService $historyService)
    {
        $this->historyService = $historyService;
    }

    public function createHistory(HistoryRequest $request) : JsonResponse{
        return $this->historyService->createHistory($request)->toJson();
    }

    public function updateHistory(Request $request, $historyId) : JsonResponse{
        return $this->historyService->updateHistory($request, $historyId)->toJson();
    }

    public function deleteHistory($historyId) :JsonResponse {
        return $this->historyService->deleteHistory($historyId)->toJson();
    }

    public function getHistoryById($historyId) {
        return $this->historyService->getHistoryById($historyId);
    }

    public function viewHistory(){
        return $this->historyService->viewHistory();
    }
}
