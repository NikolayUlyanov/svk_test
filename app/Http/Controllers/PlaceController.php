<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Event's places list.
     *
     * @OA\Get(
     *      path="/api/events/{eventId}/places",
     *      operationId="GetEventPlaces",
     *      description="Show list of available event's places",
     *      @OA\Parameter(
     *            description="Event ID",
     *            in="path",
     *            name="eventId",
     *            required=true,
     *            @OA\Schema(type="integer"),
     *        ),
     * *
     *      @OA\Response(response="200", description="Show list of available event's places"),
     *      @OA\Response(response="405", description="Request method not allowed")
     *  )
     *
     *
     * @param int $eventId
     * @return array|null
     */
    public function index(int $eventId): ?array
    {
        return $this->ticketApiClient->getEventPlaces($eventId);
    }

    /**
     * Places reserve.
     *
     * @OA\Post(
     *      path="/api/events/{eventId}/reserve",
     *      operationId="ReservePlaces",
     *      description="Reserve places",
     *      @OA\Parameter(
     *            description="Event ID",
     *            in="path",
     *            name="eventId",
     *            required=true,
     *            @OA\Schema(type="integer"),
     *        ),
     *      @OA\Parameter(
     *            description="Customer name",
     *            in="query",
     *            name="name",
     *            required=true,
     *            @OA\Schema(type="string"),
     *        ),
     *      @OA\Parameter(name="places", required=true, in="query", @OA\Schema(type="array", @OA\Items(type="integer")), description="Places Ids"),
     *
     * *
     *      @OA\Response(response="200", description="Places is reserved"),
     *      @OA\Response(response="405", description="Request method not allowed")
     *  )
     *
     *
     * @param Request $request
     * @param int $eventId
     * @return array|null
     */
    public function reserve(Request $request, int $eventId): ?array
    {
        $request->validate([
            'name' => 'required|string',
            'places' => 'required|array',
        ]);

        return $this->ticketApiClient->reservePlaces($eventId, $request['name'], $request['places']);
    }
}
