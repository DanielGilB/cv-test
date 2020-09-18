<?php

namespace App\Repositories\booking;

use App\Models\Table;

class AvailableBookingRepositoryImpl implements AvailableBookingRepository
{
    public function get(string $date, $slots): array
    {
        $availableTables = Table::availableOnDateWithSlots($date, $slots)->get();
        return $availableTables->toArray();
    }
}
