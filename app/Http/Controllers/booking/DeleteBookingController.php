<?php

namespace App\Http\Controllers\booking;

use App\Http\Controllers\Controller;
use App\Services\booking\DeleteBookingService;

class DeleteBookingController extends Controller
{
    private $deleteBookingService;

    public function __construct(DeleteBookingService $deleteBookingService)
    {
        $this->deleteBookingService = $deleteBookingService;
    }

    public function __invoke(int $id)
    {
        $this->deleteBookingService->deleteById($id);
    }
}
