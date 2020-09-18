<?php

namespace App\Services\booking;

interface DeleteBookingService
{
    /**
     * Delete a booking by id
     *
     * @param integer $id
     * @return void
     */
    public function deleteById(int $id);
}
