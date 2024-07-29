<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterCa\RegisterCaRequest;
use App\Repositories\RegisterCaRepositories;
use Illuminate\Http\Request;

class RegisterCaController extends Controller
{
    protected $registerCaRepositories;

    public function __construct(RegisterCaRepositories $registerCaInterfaces)
    {
        $this->registerCaRepositories = $registerCaInterfaces;
    }

    public function getAllData()
    {
        return $this->registerCaRepositories->getAllData();
    }

    public function createData(RegisterCaRequest $request)
    {
        return $this->registerCaRepositories->createData($request);
    }

    public function getDataById($id)
    {
        return $this->registerCaRepositories->getDataById($id);
    }

    public function updateData(RegisterCaRequest $request, $id)
    {
        return $this->registerCaRepositories->updateData($request, $id);
    }

    public function deleteData($id)
    {
        return $this->registerCaRepositories->deleteData($id);
    }
}
