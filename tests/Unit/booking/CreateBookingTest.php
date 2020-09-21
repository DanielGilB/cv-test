<?php

namespace Tests\Unit\booking;

use App\Exceptions\NotAvailableTableException;
use App\Models\Booking;
use App\Models\Table;
use App\Repositories\booking\CreateBookingRepositoryImpl;
use App\Repositories\table\CheckAvailableTableRepositoryImpl;
use App\Services\booking\CreateBookingServiceImpl;
use App\Services\table\CheckAvailableTableServiceImpl;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateBookingTest extends TestCase
{
    use DatabaseMigrations;

    private $createBookingService;
    private $date = '2020-01-01';
    private $name = 'test name booking';

    protected function setUp(): void
    {
        parent::setUp();
        $this->createBookingService = new CreateBookingServiceImpl(
            new CheckAvailableTableServiceImpl(new CheckAvailableTableRepositoryImpl),
            new CreateBookingRepositoryImpl
        );
    }

    public function test_createBooking_availableBooking_shouldCreateBooking()
    {
        $table = Table::factory()->create();
        $slots = 1;

        $booking = $this->createBookingService->create($this->date, $slots, $this->name, $table->id);

        $this->assertEquals($booking->date, $this->date);
        $this->assertEquals($booking->slots, $slots);
        $this->assertEquals($booking->name, $this->name);
        $this->assertEquals($booking->table_id, $table->id);
    }

    public function test_createBooking_invalidSlots_shouldNotCreateBooking()
    {
        $table = Table::factory(['maxSlots' => 5])->create();
        $slots = 10;

        $this->expectException(NotAvailableTableException::class);
        $this->createBookingService->create($this->date, $slots, $this->name, $table->id);
    }

    public function test_createBooking_existingBookingSameDate_shouldNotCreateBooking()
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

        $this->expectException(NotAvailableTableException::class);
        $this->createBookingService->create($this->date, $slots, $this->name, $table->id);
    }
}
