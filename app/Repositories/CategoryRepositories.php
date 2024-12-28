<?php

namespace App\Repositories;

use App\Http\Requests\Category\CategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Models\CategoryModel;
use App\Traits\HttpResponseTrait;

class CategoryRepositories implements CategoryInterface
{
    protected $categoryModel;
    use HttpResponseTrait;

    public function __construct(CategoryModel $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }
    
    public function getAllData()
    {
        $data = $this->categoryModel->all();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        }else{
            return $this->success($data, 'success', 'success get all data');
        }
    }

    public function createData(CategoryRequest $request){
        try {
            $data = new $this->categoryModel;
            $data->name_category = $request->input('name_category');
            $data->save();

            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id){
        $data = $this->categoryModel->find($id);
        if (!$data) {
            return $this->dataNotFound();
        }else {
            return $this->success($data, 'success', 'success get data by id');
        }
    }

    public function updateData(CategoryRequest $request, $id){
        try {
            $data = $this->categoryModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->name_category = $request->input('name_category');
            $data->save();

            return $this->success($data, 'success', 'success update data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id){
        try {
            $data = $this->categoryModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->delete();
            return $this->success($data, 'success', 'success delete data');
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error',
            'message' => 'Data sedang digunakan', 500]);
        }
    }
}
