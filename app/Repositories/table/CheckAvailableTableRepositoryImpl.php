<?php

namespace App\Repositories\table;

use App\Exceptions\InvalidSlotsException;
use App\Models\Table;

class CheckAvailableTableRepositoryImpl implements CheckAvailableTableRepository
{
    public function checkById(int $tableId, string $date, int $slots): bool
    {
        $table = Table::find($tableId);

        return $table->isFillableSlots($slots) && $table->hasNotBookingOnDate($date);
    }
}
