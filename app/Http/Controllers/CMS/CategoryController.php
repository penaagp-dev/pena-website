<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Repositories\CategoryRepositories;

class CategoryController extends Controller
{
    protected $CategoryRepositories;

    public function __construct(CategoryRepositories $CategoryInterface)
    {
        $this->CategoryRepositories = $CategoryInterface;
    }

    public function getAllData()
    {
        return $this->CategoryRepositories->getAllData();
    }
    public function createData(CategoryRequest $request)
    {
        return $this->CategoryRepositories->createData($request);
    }
    public function getDataById($id){
        return $this->CategoryRepositories->getDataById($id);
    }
    public function updateData(CategoryRequest $request, $id){
        return $this->CategoryRepositories->updateData($request, $id);
    }
    public function deleteData($id){
        return $this->CategoryRepositories->deleteData($id);
    }
}
