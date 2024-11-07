<?php

namespace App\Interfaces;

use App\Http\Requests\Inventaris\InventarisRequest;

interface InventarisInterfaces
{
    public function getAllData();
    public function createData(InventarisRequest $request);
    public function getDataById($id);
    public function updateData(InventarisRequest $request, $id);
    public function deleteData($id);
}
