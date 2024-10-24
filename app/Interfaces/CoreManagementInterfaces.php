<?php

namespace App\Interfaces;

use App\Http\Requests\CoreManagement\CoreManagementRequest;

interface CoreManagementInterfaces
{
    public function getAllData();
    public function createData(CoreManagementRequest $request);
    public function getDataById($id);
    public function updateData(CoreManagementRequest $request, $id);
    public function deleteData($id);
}
