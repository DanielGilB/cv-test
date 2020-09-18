<?php

namespace App\Http\Controllers\booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\booking\AvailableBookingRequest;
use App\Http\Resources\AvailableBooking as AvailableBookingJson;
use App\Services\booking\AvailableBookingService;
use Carbon\Carbon;

class AvailableBookingController extends Controller
{
    private $availableBookingService;

    public function __construct(AvailableBookingService $availableBookingService)
    {
        $this->availableBookingService = $availableBookingService;
    }

    public function __invoke(AvailableBookingRequest $request)
    {
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');
        $slots = $request->input('slots');

        $availableTables = $this->availableBookingService->get($date, $slots);
        return new AvailableBookingJson($availableTables);
    }
}
