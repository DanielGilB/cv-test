<?php

namespace App\Services\booking;

use App\Models\Booking;

interface CreateBookingService
{
    /**
     * Create a booking
     *
     * @param string $date
     * @param integer $slots
     * @param string $name
     * @param string $tableId
     * @return Booking
     */
    public function create(string $date, int $slots, string $name, int $tableId): Booking;
}
