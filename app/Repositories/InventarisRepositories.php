<?php

namespace App\Repositories;

use App\Helper\ImageHandler;
use App\Http\Requests\Inventaris\InventarisRequest;
use App\Interfaces\InventarisInterfaces;
use App\Models\InventarisModel;
use App\Traits\HttpResponseTrait;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InventarisRepositories implements InventarisInterfaces
{
    protected $inventarisModel;
    use HttpResponseTrait;

    public function __construct(InventarisModel $inventarisModel)
    {
        $this->inventarisModel = $inventarisModel;
    }

    public function getAllData()
    {
        $data = $this->inventarisModel->all();
        if($data->isEmpty()){
            return $this->dataNotFound();
        }else{
            return $this->success($data, 'success', 'success get all data inventaris barang');
        }
    }

    public function createData(InventarisRequest $request)
    {
        try {
            $data = new $this->inventarisModel;
            $data->name_inventaris = $request->input('name_inventaris');
            $data->stock = $request->input('stock');
            $data->location_item = $request->input('location_item');
            $data->id_category = $request->input('id_category');
            $data->status = $request->input('status');
            $data->is_condition = $request->input('is_condition');
            $data->description = $request->input('description');
            if ($request->hasFile('img_inventaris')) {
                $data->img_inventaris = ImageHandler::uploadImage($request->file('img_inventaris'), 'uploads/inventaris', 'INVENTARIS-BARANG');
            }
            $data->save();

            return $this->success($data, 'success', 'success create data inventaris barang');
        } catch (\Throwable $th) {
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

            return $this->success($data, 'success', 'success update data inventaris barang');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
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
