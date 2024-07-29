<?php

namespace App\Interfaces;

use App\Http\Requests\RegisterCa\RegisterCaRequest;

interface RegisterCaInterfaces
{
    public function getAllData();
    public function createData(RegisterCaRequest $request);
    public function getDataById($id);
    public function updateData(RegisterCaRequest $request, $id);
    public function deleteData($id);
    public function registerCaFe(RegisterCaRequest $request);
    public function verifyEmailExp($token);
    
}
