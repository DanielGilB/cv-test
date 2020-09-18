<?php

namespace App\Repositories\table;

use App\Models\Table;

class DeleteTableRepositoryImpl implements DeleteTableRepository
{
    public function deleteById(int $id)
    {
        Table::destroy($id);
    }
}
