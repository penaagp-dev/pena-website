<?php

namespace App\Http\Controllers\CMS;

use App\Exports\DataCaExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Inventaris\InventarisRequest;
use App\Repositories\InventarisRepositories;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    protected $inventarisRepositories;

    public function __construct(InventarisRepositories $inventarisInterfaces)
    {
        $this->inventarisRepositories = $inventarisInterfaces;
    }

    public function getAllData()
    {
        return $this->inventarisRepositories->getAllData();
    }

    public function createData(InventarisRequest $request)
    {
        return $this->inventarisRepositories->createData($request);
    }

    public function getDataById($id)
    {
        return $this->inventarisRepositories->getDataById($id);
    }

    public function updateData(InventarisRequest $request, $id)
    {
        return $this->inventarisRepositories->updateData($request, $id);
    }

    public function deleteData($id)
    {
        return $this->inventarisRepositories->deleteData($id);
    }
}
