<?php

namespace App\Repositories\History;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\History;

class HistoryRepositoryImplement extends Eloquent implements HistoryRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $history;

    public function __construct(History $history)
    {
        $this->history = $history;
    }

    public function createHistory($historyData)
    {
        return $this->history->create($historyData);
    }

    public function updateHistory($historyData, $historyId)
    {
        return $this->history->findOrFail($historyId)->update($historyData);
    }

    public function deleteHistory($historyId)
    {
        return $this->history->destroy($historyId);
    }

    public function getHistoryById($historyId)
    {
        return $this->history->findOrFail($historyId);
    }

    public function viewHistory()
    {
        return $this->history->all();
    }

    // Write something awesome :)
}
