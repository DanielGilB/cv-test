<?php

namespace App\Services\booking;

interface AvailableBookingService
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
