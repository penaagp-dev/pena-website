<?php

namespace App\Interfaces;

use App\Http\Requests\Category\CategoryRequest;

interface CategoryInterface
{
    public function getAllData();
    public function createData(CategoryRequest $request);
    public function getDataById($id);
    public function updateData(CategoryRequest $request, $id);
    public function deleteData($id);

}
