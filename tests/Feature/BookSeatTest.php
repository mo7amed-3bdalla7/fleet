<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookSeatTest extends TestCase
{
    use RefreshDatabase;

    public function testWithoutRequestBody()
    {
        $this->json('POST', '/api/book-seats')
            ->assertStatus(422);
    }

    public function testWrongStationsIds()
    {

        $this->json(
            'POST',
            '/api/book-seats',
            ['start' => 1, 'end' => 1]
        )->assertStatus(422);

        $this->json(
            'POST',
            '/api/book-seats',
            ['start' => -1, 'end' => 1]
        )->assertStatus(422);
    }


    public function testValidRequest()
    {
        $this->json(
            'POST',
            '/api/book-seats',
            ['start' => 1, 'end' => 5]
        )->assertStatus(200)
            ->assertJsonPath('ticket.id', 1);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

}
