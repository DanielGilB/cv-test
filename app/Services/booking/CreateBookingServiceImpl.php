<?php

namespace App\Services\booking;

use App\Exceptions\NotAvailableTableException;
use App\Models\Booking;
use App\Repositories\booking\AvailableBookingRepository;
use App\Repositories\booking\CreateBookingRepository;

class CreateBookingServiceImpl implements CreateBookingService
{
    private $createBookingRepository;
    private $availableBookingRepository;

    public function __construct(
        CreateBookingRepository $createBookingRepository,
        AvailableBookingRepository $availableBookingRepository
    ) {
        $this->createBookingRepository = $createBookingRepository;
        $this->availableBookingRepository = $availableBookingRepository;
    }

    public function create(string $date, int $slots, string $name, int $tableId): Booking
    {
        $booking = $this->createBookingRepository->create($date, $slots, $tableId, $name);
        return $booking;
    }
}
