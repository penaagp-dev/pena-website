<?php

namespace App\Interfaces;

use App\Http\Requests\Borrow\BorrowRequest;

interface BorrowInterface
{
    public function getAllData();
    public function CreateData(BorrowRequest $request);
    public function getDataById($id);
    public function UpdateData(BorrowRequest $request, $id);
    public function deleteData($id);
}
