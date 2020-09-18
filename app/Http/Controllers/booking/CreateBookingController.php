<?php

namespace App\Http\Controllers\booking;

use App\Exceptions\NotAvailableTableException;
use App\Http\Controllers\Controller;
use App\Http\Requests\booking\CreateBookingRequest;
use App\Http\Resources\Booking as BookingJson;
use App\Services\booking\CreateBookingService;
use App\Services\table\CheckAvailableTableService;
use Carbon\Carbon;

class CreateBookingController extends Controller
{
    private $createBookingService;
    private $checkAvailableTableService;

    public function __construct(
        CreateBookingService $createBookingService,
        CheckAvailableTableService $checkAvailableTableService
    ) {
        $this->createBookingService = $createBookingService;
        $this->checkAvailableTableService = $checkAvailableTableService;
    }

    public function __invoke(CreateBookingRequest $request)
    {
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');
        $slots = $request->input('slots');
        $name = $request->input('name');
        $tableId = $request->input('tableId');

        $isTableAvailable = $this->checkAvailableTableService->checkById($tableId, $date, $slots);

        if (!$isTableAvailable) {
            throw new NotAvailableTableException();
        }

        $booking = $this->createBookingService->create($date, $slots, $name, $tableId);
        return new BookingJson($booking);
    }
}
