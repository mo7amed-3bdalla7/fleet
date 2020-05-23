<?php

namespace Tests\Unit;

use App\Availability;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvailableSeatTest extends TestCase
{
    use RefreshDatabase;

    public function testAvailableSeatsMethod()
    {
        $seats = Availability::availableSeats(1, 1, 5);
        $this->assertCount(12, $seats);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this::seed();
    }
}
