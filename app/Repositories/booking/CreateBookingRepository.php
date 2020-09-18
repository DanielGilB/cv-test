<?php

namespace App\Repositories\booking;

use App\Models\Booking;

interface CreateBookingRepository
{
    /**
     * Create a booking
     *
     * @param string $date
     * @param integer $slots
     * @param integer $idTable
     * @param string $name
     * @return Booking
     */
    public function create(string $date, int $slots, int $tableId, string $name): Booking;
}
