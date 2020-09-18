<?php

namespace App\Services\table;

use App\Models\Table;
use App\Exceptions\InvalidSlotsException;
use App\Repositories\table\CreateTableRepository;

class CreateTableServiceImpl implements CreateTableService
{
    protected $createTableRepository;

    public function __construct(CreateTableRepository $createTableRepository)
    {
        $this->createTableRepository = $createTableRepository;
    }

    public function create(int $minSlots, int $maxSlots): Table
    {
        $this->validate($minSlots, $maxSlots);
        $table = $this->createTableRepository->create($minSlots, $maxSlots);

        return $table;
    }

    private function validate($minSlots, $maxSlots)
    {
        if ($minSlots < 0 || ($maxSlots < $minSlots)) {
            throw new InvalidSlotsException();
        }
    }
}
