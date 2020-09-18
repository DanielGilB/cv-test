<?php

namespace App\Repositories\table;

interface DeleteTableRepository
{
    /**
     * Delete a table by id
     *
     * @param integer $id
     * @return void
     */
    public function deleteById(int $id);
}
