<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoreManagement\CoreManagementRequest;
use App\Repositories\CoreManagementRepositories;
use Illuminate\Http\Request;

class CoreManagementController extends Controller
{
    protected $coreManagementRepositories;
    
    public function __construct(CoreManagementRepositories $coreManagementRepositories)
    {
        $this->coreManagementRepositories = $coreManagementRepositories;
    }

    public function getAllData()
    {
        return $this->coreManagementRepositories->getAllData();
    }

    public function createData(CoreManagementRequest $request){
        return $this->coreManagementRepositories->createData($request);
    }

    public function getDataById($id){
        return $this->coreManagementRepositories->getDataById($id);
    }

    public function updateData(CoreManagementRequest $request, $id){
        return $this->coreManagementRepositories->updateData($request, $id);
    }

    public function deleteData($id)
    {
        return $this->coreManagementRepositories->deleteData($id);
    }
    
}
