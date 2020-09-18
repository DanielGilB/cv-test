<?php

namespace App\Services\booking;

use App\Repositories\booking\DeleteBookingRepository;

class DeleteBookingServiceImpl implements DeleteBookingService
{
    protected $deleteBookingRepository;

    public function __construct(DeleteBookingRepository $deleteBookingRepository)
    {
        $this->deleteBookingRepository = $deleteBookingRepository;
    }

    public function deleteById(int $id)
    {
        $this->deleteBookingRepository->deleteById($id);
    }
}
