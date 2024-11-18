<?php

namespace App\Interfaces;

use App\Http\Requests\UserManagement\UserManagementRequest;

interface UserManagementInterface
{
    public function getAllData();
    public function createData(UserManagementRequest $request);
    public function getDataById($id);
    public function updateData(UserManagementRequest $request, $id);
    public function deleteData($id);
}
