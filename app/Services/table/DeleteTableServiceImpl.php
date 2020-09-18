<?php

namespace App\Services\table;

use App\Repositories\table\DeleteTableRepository;

class DeleteTableServiceImpl implements DeleteTableService
{
    protected $deleteTableRepository;

    public function __construct(DeleteTableRepository $deleteTableRepository)
    {
        $this->deleteTableRepository = $deleteTableRepository;
    }

    public function deleteById(int $id)
    {
        $this->deleteTableRepository->deleteById($id);
    }
}
