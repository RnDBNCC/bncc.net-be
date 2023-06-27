<?php

namespace App\Repositories\Event;

use LaravelEasyRepository\Repository;

interface EventRepository extends Repository{

    public function getEvent();
    public function getEventbyId($eventId);
    public function createEvent($request);
    public function updateEvent($request, $eventId);
    public function deleteEvent($eventId);

}
