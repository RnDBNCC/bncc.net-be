<?php

namespace App\Services\Event;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Event\EventRepository;

class EventServiceImplement extends ServiceApi implements EventService{

    /**
     * set message api for CRUD
     * @param string $title
     * @param string $create_message
     * @param string $update_message
     * @param string $delete_message
     */
    protected $title = "";
    protected $create_message = "";
    protected $update_message = "";
    protected $delete_message = "";

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function getEvent(){
        try{
            return $this->eventRepository->getEvent();
        }
        catch (\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }

    public function getEventbyId($eventId){
        try{
            return $this->eventRepository->getEventbyId($eventId);
        }
        catch (\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }

    public function createEvent($request){
        try{
            $file = $request->has('event_poster') ? $this->uploadFile($request->file('event_poster'), $request->event_title) : null;
            $eventData = [
                'event_poster' => $file,
                'event_title' => $request->event_title,
                'event_start_date' => $request->event_start_date,
                'event_end_date' => $request->event_end_date,
                'event_start_time' => $request->event_start_time,
                'event_end_time' => $request->event_end_time
            ];
            $result = $this->eventRepository->createEvent($eventData);
            return $this->setMessage($title." ".$create_message)->setStatus(true)->setCode(200)->setResult($result);
        }
        catch (\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }

    public function updateEvent($request, $eventId){
        try{
            $event = $this->getEventbyId($eventId);
            File::delete($event->event_poster);
            $file = $request->has('event_poster') ? $this->uploadFile($request->file('event_poster'), $request->event_title) : null;
            $eventData = [
                'event_poster' => $file,
                'event_title' => $request->event_title,
                'event_start_date' => $request->event_start_date,
                'event_end_date' => $request->event_end_date,
                'event_start_time' => $request->event_start_time,
                'event_end_time' => $request->event_end_time
            ];
            $result = $this->eventRepository->updateEvent($eventId, $eventData);
            return $this->setMessage($title." ".$update_message)->setStatus(true)->setCode(200)->setResult($result);
        }
        catch (\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }

    public function uploadFile($data, $file_name)
    {
        $extension = $data->getClientOriginalExtension();
        $fileWithExtension = $file_name . "_" . (date("YmdHis", time())) . '.' . $extension;
        $path = $data->storeAs('/public/storage/image/event', $fileWithExtension);
        $data->move(public_path() . '/storage/image/event', $fileWithExtension);
        return $path;
    }

    public function deleteEvent($eventId){
        try{
            $result = $this->eventRepository->deleteEvent($eventId);
            return $this->setMessage($this->title." ".$this->delete_message)->setStatus(true)->setCode(200)->setResult($result);
        }
        catch (\Exception $exception){
            return $this->exceptionResponse($exception);
        }
    }
}
