<?php

namespace App\Clients\TicketApi;

interface TicketApiInterface
{
    public function getShows(): ?array;

    public function getShowEvents(int|string $showId): ?array;

    public function getEventPlaces(int|string $eventId): ?array;

    public function reservePlaces(int|string $eventId, string $customerName, array $placesIds): ?array;
}
