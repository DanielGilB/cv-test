<?php

namespace App\Repositories\booking;

interface AvailableBookingRepository
{
    /**
     * Get available tables to booking on date
     *
     * @param string $date
     * @param int $slots
     * @return array
     */
    public function get(string $date, int $slots): array;
}
