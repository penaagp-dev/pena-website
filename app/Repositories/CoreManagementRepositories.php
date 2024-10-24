<?php

namespace App\Repositories;

use App\Helper\ImageHandler;
use App\Http\Requests\CoreManagement\CoreManagementRequest;
use App\Interfaces\CoreManagementInterfaces;
use App\Models\CoreManagementModal;
use App\Traits\HttpResponseTrait;

class CoreManagementRepositories implements CoreManagementInterfaces
{
    use HttpResponseTrait;
    protected $coreManagementModal;

    public function __construct(CoreManagementModal $coreManagementModal)
    {
        $this->coreManagementModal = $coreManagementModal;
    }

    public function getAllData()
    {
        $data = $this->coreManagementModal->all();
        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data, 'success get all data pengurus inti', 200);
        }
    }

    public function createData(CoreManagementRequest $request)
    {
        try {
            $validatedJabatan = $request->validated();
            $existingDataJabatan = $this->coreManagementModal->where('jabatan', $validatedJabatan['jabatan'])->first();
            if ($existingDataJabatan) {
                return response()->json([
                    'status' => 'validate',
                    'message' => 'Jabatan sudah ada'
                ], 422);
            } else {
                $data = new $this->coreManagementModal;
                $data->name = $request->input('name');
                $data->jabatan = $request->input('jabatan');
                if ($request->hasFile('photo')) {
                    $data->photo = ImageHandler::uploadImage($request->file('photo'), 'uploads/coremanagement', 'PENGURUS-INTI-');
                }
                $data->save();
                return $this->success($data, 'success','success create data pengurus inti');
            }
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id)
    {
        $data = $this->coreManagementModal->find($id);
        if ($data) {
            return $this->success($data,'success','success get data pengurus inti by id');
        } else {
            return $this->dataNotFound();
        }
    }

    public function updateData(CoreManagementRequest $request, $id)
    {
        try {
            $validatedJabatan = $request->validated();

            $data = $this->coreManagementModal->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }

            $existingDataJabatan = $this->coreManagementModal->where('jabatan', $validatedJabatan['jabatan'])->where('id', '!=', $id)->first();

            if ($existingDataJabatan) {
                return response()->json([
                    'status' => 'validate',
                    'message' => 'Jabatan sudah ada'
                ], 422);
            }else{
                $data->name = $request->input('name');
                $data->jabatan = $request->input('jabatan');
                if($request->hasFile('photo')){
                    $data->photo = ImageHandler::updateImage($request->File('photo'), 'uploads/coremanagement', 'PENGURUS-INTI-', $data->photo);
                }
                $data->save();

                return $this->success($data,'success', 'success update data');
            }
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->coreManagementModal->find($id);
            if(!$data){
                return $this->dataNotFound();
            }
            $file = $data->photo;
            if(file_exists(public_path('uploads/coremanagement/' . $file))){
                unlink(public_path('uploads/coremanagement/' . $file));
            }

            $data->delete();
            return $this->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
