<?php

namespace App\Services\Event;

use LaravelEasyRepository\BaseService;

interface EventService extends BaseService{

    public function getEvent();
    public function getEventbyId($eventId);
    public function createEvent($request);
    public function updateEvent($request, $eventId);
    public function deleteEvent($eventId);

}
