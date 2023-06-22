<?php

namespace App\Repositories\History;

use LaravelEasyRepository\Repository;

interface HistoryRepository extends Repository{

    public function createHistory($historyData);

    public function updateHistory($historyData, $historyId);

    public function deleteHistory($historyId);

    public function getHistoryById($historyId);

    public function viewHistory();
}
