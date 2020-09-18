<?php

namespace App\Repositories\table;

use App\Models\Table;

interface CreateTableRepository
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
