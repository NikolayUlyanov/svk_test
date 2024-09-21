<?php


use App\Clients\TicketApi\TicketApiInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\TestCase;

class TicketApiTest extends TestCase
{
    public function test_shows_index(): void
    {
        $ticketApiClientClassName = env('TICKET_API_CLIENT');

        $this->mock($ticketApiClientClassName, function (MockInterface $mock) {
            $mock->shouldReceive('getShows')->once();
        });

        $response = $this->get('/api/shows');

        $response->assertStatus(200);
    }
}
