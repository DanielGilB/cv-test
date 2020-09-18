<?php

namespace App\Http\Controllers\table;

use App\Http\Controllers\Controller;
use App\Http\Requests\table\CreateTableRequest;
use App\Http\Resources\Table as TableJson;
use App\Services\table\CreateTableService;


class CreateTableController extends Controller
{

    private $createTableService;

    public function __construct(CreateTableService $createTableService)
    {
        $this->createTableService = $createTableService;
    }

    /**
     * 
     * @param CreateTableRequest $request
     * @return Table
     */
    public function __invoke(CreateTableRequest $request)
    {
        $minSlots = $request->input('minSlots');
        $maxSlots = $request->input('maxSlots');

        $table = $this->createTableService->create($minSlots, $maxSlots);

        return new TableJson($table);
    }
}
