<?php

namespace App\Services\History;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\History\HistoryRepository;

class HistoryServiceImplement extends ServiceApi implements HistoryService{

    /**
     * set message api for CRUD
     * @param string $title
     * @param string $create_message
     * @param string $update_message
     * @param string $delete_message
     */
    protected $title = "History";
    protected $create_message = "Successfuly created!";
    protected $update_message = "Successfuly updated!";
    protected $delete_message = "Successfuly deleted!";

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $historyRepository;

    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    public function createHistory($request)
    {
        try{
            $historyData = [
                'year' => $request->year,
                'description' => $request->description,
            ];
            $result = $this->historyRepository->createHistory($historyData);
            return $this->setMessage($this->title." ".$this->create_message)->setStatus(true)->setCode(200)->setResult($result);
        }catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }

    public function updateHistory($request, $historyId)
    {
        try{
            $history = $this->getHistoryById($historyId);
            $historyData = [
                'year' => $request->year,
                'description' => $request->description,
            ];
            $result = $this->historyRepository->updateHistory($historyData, $historyId);
            return $this->setMessage($this->title." ".$this->update_message)->setStatus(true)->setCode(200)->setResult($result);

        }catch(\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }

    public function deleteHistory($historyId)
    {
        try{
            $result = $this->historyRepository->deleteHistory($historyId);
            return $this->setMessage($this->title." ".$this->delete_message)->setStatus(true)->setCode(200)->setResult($result);
        }catch(\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }

    public function getHistoryById($historyId)
    {
        try{
            return $this->historyRepository->getHistoryById($historyId);
        }catch(\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }

    public function viewHistory()
    {
        try{
            return $this->historyRepository->viewHistory();
        }catch(\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }
}
