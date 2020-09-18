<?php

namespace App\Http\Controllers\table;

use App\Http\Controllers\Controller;
use App\Services\table\DeleteTableService;

class DeleteTableController extends Controller
{

    private $deleteTableService;

    public function __construct(DeleteTableService $deleteTableService)
    {
        $this->deleteTableService = $deleteTableService;
    }

    /**
     *
     * @param integer $id
     * @return void
     */
    public function __invoke(int $id)
    {
        $this->deleteTableService->deleteById($id);
    }
}
