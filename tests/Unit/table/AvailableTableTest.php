<?php

namespace Tests\Unit\table;

use App\Models\Booking;
use App\Models\Table;
use App\Repositories\table\CheckAvailableTableRepositoryImpl;
use App\Services\table\CheckAvailableTableServiceImpl;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AvailableTableTest extends TestCase
{
    use DatabaseMigrations;

    private $checkAvailableTableService;
    private $date = '2020-01-01';

    protected function setUp(): void
    {
        parent::setUp();
        $this->checkAvailableTableService = new CheckAvailableTableServiceImpl(new CheckAvailableTableRepositoryImpl);
    }

    public function test_checkAvailableTable_availableBooking_shouldTrue()
    {
        $tableWithoutBooking = Table::factory()->create();
        $slots = 1;

        $isTableAvailable = $this->checkAvailableTableService->checkById(
            $tableWithoutBooking->id,
            $this->date,
            $slots
        );

        $this->assertTrue($isTableAvailable);
    }

    public function test_checkAvailableTable_exceedMaxSlots_shouldFalse()
    {
        $table = Table::factory(['maxSlots' => 5])->create();
        $slots = 10;

        $isTableAvailable = $this->checkAvailableTableService->checkById(
            $table->id,
            $this->date,
            $slots
        );

        $this->assertFalse($table->isFillableSlots($slots));
        $this->assertFalse($isTableAvailable);
    }

    public function test_checkAvailableTable_failingMinSlots_shouldFalse()
    {
        $table = Table::factory(['minSlots' => 2])->create();
        $slots = 1;

        $isTableAvailable = $this->checkAvailableTableService->checkById(
            $table->id,
            $this->date,
            $slots
        );

        $this->assertFalse($table->isFillableSlots($slots));
        $this->assertFalse($isTableAvailable);
    }

    public function test_checkAvailableTable_existingBookingSameDate_shouldFalse()
    {
        $table = Table::factory([
            'minSlots' => 1,
            'maxSlots' => 5
        ])->create();
        $slots = 5;

        $extistingBooking = Booking::factory([
            'table_id' => $table->id,
            'date' => $this->date
        ])->create();

        $isTableAvailable = $this->checkAvailableTableService->checkById(
            $table->id,
            $this->date,
            $slots
        );

        $this->assertEquals($this->date, $extistingBooking->date);
        $this->assertFalse($isTableAvailable);
    }
}
