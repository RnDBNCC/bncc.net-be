<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Services\Event\EventService;
use Illuminate\Http\Request;

class Event extends Controller
{
    protected $eventService;

    public function __construct(EventService $eventService){
        $this->eventService = $eventService;
    }

    public function getEvent(){
        return $this->eventService->getEvent();
    }

    public function getEventbyId($eventId){
        return $this->eventService->getEventbyId($eventId);
    }

    public function createEvent(Request $request) : JsonResponse{
        return $this->eventService->createEvent($request)->toJson();
    }

    public function updateEvent(Request $request, $eventId) : JsonResponse{
        return $this->eventService->updateEvent($request, $eventId)->toJson();
    }

    public function deleteEvent($eventId) : JsonResponse{
        return $this->eventService->deleteEvent($eventId)->toJson();
    }

}
