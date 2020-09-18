<?php

namespace App\Services\table;

interface DeleteTableService
{
    /**
     * Delete a table by id
     *
     * @param integer $id
     * @return void
     */
    public function deleteById(int $id);
}
