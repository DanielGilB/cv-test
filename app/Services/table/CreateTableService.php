<?php

namespace App\Services\table;

use App\Models\Table;

interface CreateTableService
{
    /**
     * Create table
     *
     * @param integer $minSlots
     * @param integer $maxSlots
     * @return Table
     */
    public function create(int $minSlots, int $maxSlots): Table;
}
