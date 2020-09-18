<?php

namespace App\Repositories\table;

use App\Exceptions\InvalidSlotsException;
use App\Models\Table;

class CheckAvailableTableRepositoryImpl implements CheckAvailableTableRepository
{
    public function checkById(int $tableId, string $date, int $slots): bool
    {
        $table = Table::find($tableId);

        if (!$table->isFillableSlots($slots)) {
            throw new InvalidSlotsException();
        }

        return !$table->hasBookingOnDate($date);
    }
}
