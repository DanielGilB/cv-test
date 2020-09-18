<?php

namespace App\Repositories\booking;

use App\Models\Booking;

class DeleteBookingRepositoryImpl implements DeleteBookingRepository
{
    public function deleteById(int $id)
    {
        Booking::destroy($id);
    }
}
