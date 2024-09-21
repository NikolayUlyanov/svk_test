<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(int $eventId): ?array
    {
        return $this->ticketApiClient->getEventPlaces($eventId);
    }

    public function reserve(Request $request, int $eventId): ?array
    {
        $request->validate([
            'name' => 'required|string',
            'places' => 'required|array',
        ]);

        return $this->ticketApiClient->reservePlaces($eventId, $request['name'], $request['places']);
    }
}
