<?php

namespace Tests\Unit\booking;

use App\Models\Booking;
use App\Models\Table;
use App\Repositories\booking\AvailableBookingRepositoryImpl;
use App\Services\booking\AvailableBookingServiceImp;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AvailableBookingTest extends TestCase
{
    use DatabaseMigrations;

    private $availableBookingService;
    private $date = '2020-01-01';

    protected function setUp(): void
    {
        parent::setUp();
        $this->availableBookingService = new AvailableBookingServiceImp(new AvailableBookingRepositoryImpl);
    }

    public function test_availableBooking_existingTableAvailable_shouldReturnAvailableBookings()
    {
        $slots = 1;
        $table = Table::factory([
            'minSlots' => 1,
            'maxSlots' => 5
        ])->create();

        Booking::factory([
            'table_id' => $table->id,
            'date' => $this->date
        ])->create();

        $availableTable = Table::factory()->create();
        $availableBookings = $this->availableBookingService->get($this->date, $slots);

        $this->assertNotEmpty($availableBookings);
        $this->assertEquals(1, count($availableBookings));
        $this->assertEquals($availableTable->id, $availableBookings[0]['id']);
    }

    public function test_availableBooking_existingOneTableWithBookingSameDate_shouldReturnNotAvailableBookings()
    {
        $table = Table::factory([
            'minSlots' => 1,
            'maxSlots' => 5
        ])->create();
        $slots = 5;

        Booking::factory([
            'table_id' => $table->id,
            'date' => $this->date
        ])->create();

        $availableBookings = $this->availableBookingService->get($this->date, $slots);
        $this->assertEmpty($availableBookings);
    }

    public function test_availableBooking_existingTableAvailableSameDateButIncorrectSlots_shouldNotReturnAvailableBookings()
    {
        $slots = 3;
        $table = Table::factory([
            'minSlots' => 1,
            'maxSlots' => 5
        ])->create();

        Booking::factory([
            'table_id' => $table->id,
            'date' => $this->date
        ])->create();

        Table::factory(['maxSlots' => 2])->create(); // Available on date but incorrect slots
        $availableBookings = $this->availableBookingService->get($this->date, $slots);

        $this->assertEmpty($availableBookings);
    }
}
