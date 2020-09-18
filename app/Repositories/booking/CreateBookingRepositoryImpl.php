<?php

namespace App\Repositories\booking;

use App\Models\Booking;
use App\Models\Table;
use App\Repositories\booking\CreateBookingRepository;

class CreateBookingRepositoryImpl implements CreateBookingRepository
{
    public function create(string $date, int $slots, int $tableId, string $name): Booking
    {
        $table = Table::findOrFail($tableId);

        $booking = Booking::create([
            'table_id' => $table->id,
            'date' => $date,
            'slots' => $slots,
            'name' => $name
        ]);

        return $booking;
    }
}
