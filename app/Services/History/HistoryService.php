<?php

namespace App\Services\History;

use LaravelEasyRepository\BaseService;

interface HistoryService extends BaseService{

    public function createHistory($request);

    public function updateHistory($request, $historyId);

    public function deleteHistory($historyId);

    public function getHistoryById($historyId);

    public function viewHistory();
}
