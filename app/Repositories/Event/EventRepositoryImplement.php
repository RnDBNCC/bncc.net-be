<?php

namespace App\Repositories\Event;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Event;

class EventRepositoryImplement extends Eloquent implements EventRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function getEvent()
    {
        return $this->event->all();
    }

    public function getEventbyId($eventId)
    {
        return $this->event->findOrFail($eventId);
    }

    public function createEvent($eventData)
    {
        return $this->event->create($eventData);
    }

    public function updateEvent($eventId, $eventData)
    {
        return $this->event->findOrFail($eventId)->update($eventData);
    }

    public function deleteEvent($eventId)
    {
        return $this->event->destroy($eventId);
    }
}
