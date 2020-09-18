<?php

namespace App\Services\booking;

use App\Models\Booking;
use App\Repositories\booking\CreateBookingRepository;

class CreateBookingServiceImpl implements CreateBookingService
{
    private $createBookingRepository;

    public function __construct(CreateBookingRepository $createBookingRepository)
    {
        $this->createBookingRepository = $createBookingRepository;
    }

    public function create(string $date, int $slots, string $name, int $tableId): Booking
    {
        $booking = $this->createBookingRepository->create($date, $slots, $tableId, $name);
        return $booking;
    }
}
