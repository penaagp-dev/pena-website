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
            if ($request->hasFile('img_inventaris')) {
                $data->img_inventaris = ImageHandler::uploadImage($request->file('img_inventaris'), 'uploads/inventaris', 'INVENTARIS-BARANG', $data->photo);
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
            // Cari data berdasarkan ID
            $data = $this->inventarisModel->find($id);
            if(!$data){
                return $this->dataNotFound();
            }

            // Buat jalur file
            $file = public_path('uploads/inventaris/' . $data->photo);

            // Pastikan jalur yang ditargetkan adalah file, bukan direktori
            if(file_exists($file) && is_file($file)){
                unlink($file); // Hapus file jika benar-benar ada dan merupakan file
            }

            // Hapus data dari database
            $data->delete();
            return $this->delete();

        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500); // Tangani error
        }
    }

}
