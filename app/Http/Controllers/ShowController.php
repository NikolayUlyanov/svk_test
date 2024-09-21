<?php

namespace App\Http\Controllers;


class ShowController extends Controller
{
    /**
     * Shows list.
     *
     * @OA\Get(
     *      path="/api/shows",
     *      operationId="GetShows",
     *      description="Show list of available shows",
     *
     * *
     *      @OA\Response(response="200", description="Show list of available shows"),
     *      @OA\Response(response="405", description="Request method not allowed")
     *  )
     *
     * @OA\Info(title="Shows list", description="Ticket test API", version="1.0")
     *
     * @return array|null
     */
    public function index(): ?array
    {
        return $this->ticketApiClient->getShows();
    }
}
