<?php

namespace App\Services\table;


interface CheckAvailableTableService
{
    /**
     * Check if a table is available on date
     *
     * @param string $date
     * @param int $tableId
     * @param int $slots
     * @return bool
     */
    public function checkById(int $tableId, string $date, int $slots): bool;
}
