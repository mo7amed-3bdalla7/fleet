<?php

namespace Tests\Feature;

use App\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvailableSeatTest extends TestCase
{
    use RefreshDatabase;

    public function testWrongTripId()
    {
        $this->json('GET', '/api/trip-available-seats/WrongId')
            ->assertStatus(404);
    }

    public function testWrongStationsIds()
    {
        $this->json('GET', '/api/trip-available-seats/1')
            ->assertStatus(422);

        $this->json('GET', '/api/trip-available-seats/1?start=1&end=1')
            ->assertStatus(422);

        $this->json('GET', '/api/trip-available-seats/1?start=wrong&end=1')
            ->assertStatus(422);
    }

    public function testValidRequest()
    {
        $this->get('/api/trip-available-seats/1?start=1&end=5')
            ->assertStatus(200)
            ->assertJsonCount(12, 'data');
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }
}
