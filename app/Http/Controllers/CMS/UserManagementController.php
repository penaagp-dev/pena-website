<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\UserManagementRequest;
use App\Repositories\UserManagementRepositories;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    protected $userManagementRepositories;

    public function __construct(UserManagementRepositories $userManagementRepositories)
    {
        $this->userManagementRepositories = $userManagementRepositories;
    }

    public function getAllData(){
        return $this->userManagementRepositories->getAllData();
    }

    public function createData(UserManagementRequest $request){
        return $this->userManagementRepositories->createData($request);
    }

    public function getDataById($id){
        return $this->userManagementRepositories->getDataById($id);
    }

    public function updateData(UserManagementRequest $request, $id){
        return $this->userManagementRepositories->updateData($request, $id);
    }

    public function deleteData($id){
        return $this->userManagementRepositories->deleteData($id);
    }
}
