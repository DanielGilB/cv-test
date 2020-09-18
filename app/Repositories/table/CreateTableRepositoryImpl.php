<?php

namespace App\Repositories\table;

use App\Models\Table;

class CreateTableRepositoryImpl implements CreateTableRepository
{
    public function create(int $minSlots, int $maxSlots): Table
    {
        $table = Table::create([
            'minSlots' => $minSlots,
            'maxSlots' => $maxSlots
        ]);

        return $table;
    }
}
