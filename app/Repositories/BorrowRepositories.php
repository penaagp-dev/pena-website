<?php

namespace App\Repositories;

use App\Http\Requests\Borrow\BorrowRequest;
use App\Interfaces\BorrowInterface;
use App\Models\BorrowModel;
use App\Traits\HttpResponseTrait;

class BorrowRepositories implements BorrowInterface
{
    protected $borrowModel;
    // protected $RegisterCaModel;
    use HttpResponseTrait;

    public function __construct(BorrowModel $borrowModel)
    {
        $this->borrowModel = $borrowModel;
        // $this->RegisterCaModel = $RegisterCaModel;
    }
    
    public function getAllData()
    {
        $data = $this->borrowModel->all();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        }else {
            return $this->success($data, 'success get all data Borrow', 200);
        }
    }

    public function CreateData(BorrowRequest $request){
        try {
            $data = new $this->borrowModel;
            // $data->id_inventaris = $request->input('id_inventaris');
            $data->name_borrow = $request->input('name_borrow');
            $data->quantity = $request->input('quantity');
            $data->description = $request->input('description');
            $data->save();
            // $inventaris = $this->RegisterCaModel->find($data->id_inventaris);
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id){
        $data = $this->borrowModel->find($id);
        if ($data) {
            return $this->success($data, 'success', 'success get data by id',);
        }else{
            return $this->dataNotFound();
        }
    }

    public function updateData(BorrowRequest $request, $id){
        try {
            $data = $this->borrowModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->name_borrow = $request->input('name_borrow');
            $data->quantity = $request->input('quantity');
            $data->description = $request->input('description');
            $data->save();

            return $this->success($data, 'succes', 'success update data borrow');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    
    public function deleteData($id)
    {
        try {
            $data = $this->borrowModel->find($id); 
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->delete();
            return $this->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }
}