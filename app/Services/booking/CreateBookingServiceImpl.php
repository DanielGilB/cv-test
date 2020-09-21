<?php

namespace App\Services\booking;

use App\Exceptions\NotAvailableTableException;
use App\Models\Booking;
use App\Repositories\booking\CreateBookingRepository;
use App\Services\table\CheckAvailableTableService;

class CreateBookingServiceImpl implements CreateBookingService
{
    private $checkAvailableTableService;
    private $createBookingRepository;

    public function __construct(
        CheckAvailableTableService $checkAvailableTableService,
        CreateBookingRepository $createBookingRepository
    ) {
        $this->checkAvailableTableService = $checkAvailableTableService;
        $this->createBookingRepository = $createBookingRepository;
    }

    public function create(string $date, int $slots, string $name, int $tableId): Booking
    {
        $isTableAvailable = $this->checkAvailableTableService->checkById($tableId, $date, $slots);

        if (!$isTableAvailable) {
            throw new NotAvailableTableException();
        }

        return $this->createBookingRepository->create($date, $slots, $tableId, $name);
    }
}
