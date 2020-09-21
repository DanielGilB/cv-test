<?php

namespace App\Http\Controllers\booking;

use App\Exceptions\NotAvailableTableException;
use App\Http\Controllers\Controller;
use App\Http\Requests\booking\CreateBookingRequest;
use App\Http\Resources\Booking as BookingJson;
use App\Services\booking\CreateBookingService;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class CreateBookingController extends Controller
{
    private $createBookingService;

    public function __construct(CreateBookingService $createBookingService)
    {
        $this->createBookingService = $createBookingService;
    }

    public function __invoke(CreateBookingRequest $request)
    {
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');
        $slots = $request->input('slots');
        $name = $request->input('name');
        $tableId = $request->input('tableId');

        try {
            $booking = $this->createBookingService->create($date, $slots, $name, $tableId);
            return new BookingJson($booking);
        } catch (NotAvailableTableException $ex) {
            return response()->json(
                ['errors' => 'Not available table with this parameters.'],
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
