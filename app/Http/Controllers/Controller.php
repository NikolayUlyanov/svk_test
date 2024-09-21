<?php

namespace App\Http\Controllers;

use App\Clients\TicketApi\TicketApiInterface;

abstract class Controller
{
    protected TicketApiInterface $ticketApiClient;

    public function __construct()
    {
        $this->ticketApiClient = app(env('TICKET_API_CLIENT'));
    }
}
