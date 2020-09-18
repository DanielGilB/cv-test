<?php

namespace App\Repositories\booking;

interface DeleteBookingRepository
{
    /**
     * Delete a booking by id
     *
     * @param integer $id
     * @return void
     */
    public function deleteById(int $id);
}
