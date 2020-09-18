<?php

namespace App\Services\booking;

use App\Repositories\booking\AvailableBookingRepository;

class AvailableBookingServiceImp implements AvailableBookingService
{
    private $availableBookingRepository;

    public function __construct(AvailableBookingRepository $availableBookingRepository)
    {
        $this->availableBookingRepository = $availableBookingRepository;
    }

    public function get(string $date, int $slots): array
    {
        return $this->availableBookingRepository->get($date, $slots);
    }
}
