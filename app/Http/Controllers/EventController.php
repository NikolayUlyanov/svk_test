<?php

namespace App\Http\Controllers;


class EventController extends Controller
{
    /**
     * Show's events list.
     *
     * @OA\Get(
     *      path="/api/shows/{showId}/events",
     *      operationId="GetShowEvents",
     *      description="Show list of available show events",
     *      @OA\Parameter(
     *            description="Show ID",
     *            in="path",
     *            name="showId",
     *            required=true,
     *            @OA\Schema(type="integer"),
     *        ),
     * *
     *      @OA\Response(response="200", description="Show list of available show events"),
     *      @OA\Response(response="405", description="Request method not allowed")
     *  )
     *
     *
     * @param int $showId
     * @return array|null
     */
    public function index(int $showId): ?array
    {
        return $this->ticketApiClient->getShowEvents($showId);
    }
}
