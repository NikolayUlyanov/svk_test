<?php

namespace App\Http\Controllers;


class ShowController extends Controller
{
    public function index(): ?array
    {
        return $this->ticketApiClient->getShows();
    }
}
