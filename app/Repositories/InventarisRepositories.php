<?php

namespace App\Repositories;

use App\Helper\ImageHandler;
use App\Http\Requests\Inventaris\InventarisRequest;
use App\Interfaces\InventarisInterfaces;
use App\Models\InventarisModel;
use App\Models\CategoryModel;
use App\Models\BorrowModel;
use App\Traits\HttpResponseTrait;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InventarisRepositories implements InventarisInterfaces
{
    protected $categoryModel;
    protected $inventarisModel;
    protected $borrowModel;
    use HttpResponseTrait;

    public function __construct(InventarisModel $inventarisModel, CategoryModel $categoryModel, BorrowModel $borrowModel)
    {
        $this->categoryModel = $categoryModel;
        $this->inventarisModel = $inventarisModel;
        $this->borrowModel = $borrowModel;
    }

    public function getAllData()
    {
        $data = $this->inventarisModel->with('category')->get();
        if(!$data){
            return $this->dataNotFound();
        }else{
            return $this->success($data, 'success', 'success get all data inventaris barang');
        }
    }

    public function createData(InventarisRequest $request)
    {

        try {
            DB::beginTransaction();
            $data = new $this->inventarisModel;
            $data->name_inventaris = $request->input('name_inventaris');
            $data->stock = $request->input('stock');
            $data->location_item = $request->input('location_item');
            $data->id_category = $request->input('id_category');
            $data->is_condition = $request->input('is_condition');
            $data->description = $request->input('description');
            if ($request->hasFile('img_inventaris')) {
                $data->img_inventaris = ImageHandler::uploadImage($request->file('img_inventaris'), 'uploads/inventaris', 'INVENTARIS-BARANG');
            }
            $data->save();
            DB::commit();
            $category = $this->inventarisModel->find($data->id_category);
            if ($category) {
                $category->status = 'inventaris';
            }
            return $this->success($data, 'success', 'success create data inventaris barang');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id)
    {
        $data = $this->inventarisModel->find($id);
        if(!$data){
            return $this->dataNotFound();
        }else{
            return $this->success($data, 'success', 'success get data inventaris barang by id');
        }
    }

    public function updateData(InventarisRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $this->inventarisModel->find($id);
            if(!$data){
                return $this->dataNotFound();
            }
            $data->name_inventaris = $request->input('name_inventaris');
            $data->stock = $request->input('stock');
            $data->location_item = $request->input('location_item');
            $data->id_category = $request->input('id_category');
            $data->status = $request->input('status');
            $data->is_condition = $request->input('is_condition');
            $data->description = $request->input('description');
            $oldFile = $data->img_inventaris;
            if ($request->hasFile('img_inventaris')) {
                $data->img_inventaris = ImageHandler::updateImage($request->file('img_inventaris'), 'uploads/inventaris', 'INVENTARIS-BARANG', $oldFile);
            }
            $data->save();
            DB::commit();
            return $this->success($data, 'success', 'success update data inventaris barang');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function returnBorrow($id)
    {
        try {
            DB::beginTransaction();

            $data = $this->borrowModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }

            $inventaris = $this->inventarisModel->find($data->id_inventaris);
            if(!$inventaris) {
                return $this->dataNotFound();
            }

            $inventaris->stock += $data->quantity;
            $inventaris->status = 'ready';
            $inventaris->save();

            $data->delete();

            DB::commit();
            return $this->success($inventaris, 'Success', 'Successfully returned borrowed item and updated stock');
            } catch (\Throwable $th) {
                DB::rollBack();
                return $this->error($th->getMessage(), 500);
            }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->inventarisModel->find($id);
            if(!$data){
                return $this->dataNotFound();
            }

            $file = public_path('uploads/inventaris/' .$data->img_inventaris);


            if(file_exists($file)){
                unlink($file);
            }
            $data->delete();
            return $this->delete();

        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }
}
