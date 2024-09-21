<?php

namespace App\Clients\TicketApi;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class TestTicketApiClient implements TicketApiInterface
{
    private string $host = 'https://leadbook.ru/test-task-api';
    private string $token;
    private PendingRequest $client;

    public function __construct()
    {
        $this->token = env('TEST_TICKET_API_TOKEN');
        $this->client = Http::withHeader('Authorization', "Bearer $this->token");
    }

    public function getShows(): ?array
    {
        return $this->getApiResponseData("$this->host/shows");
    }

    public function getShowEvents(int|string $showId): ?array
    {
        return $this->getApiResponseData("$this->host/shows/$showId/events");
    }

    public function getEventPlaces(int|string $eventId): ?array
    {
        return $this->getApiResponseData("$this->host/events/$eventId/places");
    }

    public function reservePlaces(int|string $eventId, string $customerName, array $placesIds): ?array
    {
        return $this->getApiResponseData("$this->host/events/$eventId/reserve", 'post', ['name1' => $customerName, 'places' => $placesIds]);
    }

    private function getApiResponseData(string $url, string $method = 'get', array $options = []): ?array
    {
        try {
            $response = $this->client->send($method, $url, $options);
            logger()->info("TestTicketApi send: " . json_encode([
                    'method' => $method,
                    'url' => $url,
                    'options' => $options,
                ]));
        } catch (\Exception $e) {
            // Обрабатываем ошибку запроса к api
            // Например, пишем в лог (возможно, лучше писать в отдельный файл, типа ticket_api_error.log)
            logger()->error("TestTicketApiError: " . $e->getMessage());

            // уведомляем админа?

            return null; // или бросаем exception
        }

        if ($error = @$response->json()['error']) {
            logger()->error("TestTicketApiError: Ошибка: $error");

            return ['error' => $error];
        }

        if (!is_array($data = @$response->json()['response'])) {
            // обрабатываем некорректный ответ api
            logger()->error("TestTicketApiError: Некорректный ответ api: {$response->body()}");

            return null; // или бросаем exception
        }

        return $data;
    }
}
