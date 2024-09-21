<?php

namespace App\Http\Controllers;


class EventController extends Controller
{
    public function index(int $showId): ?array
    {
        return $this->ticketApiClient->getShowEvents($showId);
    }
}
