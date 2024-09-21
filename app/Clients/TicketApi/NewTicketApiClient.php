<?php

namespace App\Clients\TicketApi;


class NewTicketApiClient implements TicketApiInterface
{
    private string $host = 'https://new-ticket-api.com';

    public function getShows(): ?array
    {
        return null;
    }

    public function getShowEvents(int|string $showId): ?array
    {
        //
    }

    public function getEventPlaces(int|string $eventId): ?array
    {
        //
    }

    public function reservePlaces(int|string $eventId, string $customerName, array $placesIds): ?array
    {
        //
    }
}
