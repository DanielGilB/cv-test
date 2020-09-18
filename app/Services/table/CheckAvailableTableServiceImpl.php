<?php

namespace App\Services\table;

use App\Repositories\table\CheckAvailableTableRepository;

class CheckAvailableTableServiceImpl implements CheckAvailableTableService
{
    private $checkAvailableTableRepository;

    public function __construct(CheckAvailableTableRepository $checkAvailableTableRepository)
    {
        $this->checkAvailableTableRepository = $checkAvailableTableRepository;
    }

    public function checkById(int $tableId, string $date, int $slots): bool
    {
        return $this->checkAvailableTableRepository->checkById($tableId, $date, $slots);
    }
}
