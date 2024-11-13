<?php

namespace App\Repositories;

use App\Http\Requests\Borrow\BorrowRequest;
use App\Interfaces\BorrowInterface;
use App\Models\BorrowModel;
use App\Models\InventarisModel;
use App\Traits\HttpResponseTrait;
use Illuminate\Support\Facades\DB;

class BorrowRepositories implements BorrowInterface
{
    protected $borrowModel;
    protected $inventarisModel;
    use HttpResponseTrait;

    public function __construct(BorrowModel $borrowModel, InventarisModel $inventarisModel)
    {
        $this->borrowModel = $borrowModel;
        $this->inventarisModel = $inventarisModel;
    }
    
    public function getAllData()
    {
        $data = $this->borrowModel->with('inventaris')->get();
        if (!$data) {
            return $this->dataNotFound();
        }else {
            return $this->success($data, 'success get all data Borrow', 200);
        }
    }

    public function CreateData(BorrowRequest $request){
        try {
            DB::beginTransaction();
            $data = new $this->borrowModel;
            $data->id_inventaris = $request->input('id_inventaris');
            $data->name_borrow = $request->input('name_borrow');
            $data->quantity = $request->input('quantity');
            $data->description = $request->input('description');
            $data->save();
            DB::commit();
            $inventaris = $this->inventarisModel->find($data->id_inventaris);
            if ($inventaris) {
                $pengurangan = $inventaris->stock - $data->quantity;
                if ($pengurangan < 0) {
                    return response()->json([
                        'code' => 402,
                        'status' => 'error',
                        'message' => 'barang di inventaris tidak cukup'
                    ], 402);
                }
                $inventaris->status = 'borrow';
                $inventaris->stock = $pengurangan;
                $inventaris->save();
                DB::commit();
            }
            return $this->success($data, 'success', 'success create data');
        } catch (\Throwable $th) {
            DB::rollback();
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
            DB::beginTransaction();
            $data = $this->borrowModel->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->id_inventaris = $request->input('id_inventaris');
            $data->name_borrow = $request->input('name_borrow');
            $data->quantity = $request->input('quantity');
            $data->description = $request->input('description');
            $data->save();
            DB::commit();
            return $this->success($data, 'succes', 'success update data borrow');
        } catch (\Throwable $th) {
            DB::rollBack();
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