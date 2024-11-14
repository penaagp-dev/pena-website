<?php

namespace App\Repositories;

use App\Http\Requests\UserManagement\UserManagementRequest;
use App\Interfaces\UserManagementInterface;
use App\Models\User;
use App\Traits\HttpResponseTrait;
use Illuminate\Support\Facades\Auth;

class UserManagementRepositories implements UserManagementInterface
{
    use HttpResponseTrait;
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllData()
    {
        $data = $this->user->all();
        if ($data) {
            return $this->success($data, 'success', 'success get all data user', 200);
        }else{
            return $this->dataNotFound();
        }
    }

    public function createData(UserManagementRequest $request){
        try {
            $data = new $this->user;
            $data->email = $request->input('email');
            $data->password = $request->input('password');
            $data->role = $request->input('role');
            $data->save();

            return $this->success($data, 'success', 'success create data user', 200);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id){
        $data = $this->user->find($id);
        if (!$data) {
            return $this->dataNotFound();
        }else {
            return $this->success($data, 'success', 'success get data by id user');
        }
    }

    public function updateData(UserManagementRequest $request, $id){
        try {
            $data = $this->user->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            $data->email = $request->input('email');
            $data->password = $request->input('password');
            $data->role = $request->input('role');
            $data->save();

            return $this->success($data, 'success', 'success update data user');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id){
        try {
            $data = $this->user->find($id);
            if (!$data) {
                return $this->dataNotFound();
            }
            if ($data->id === Auth::user()->id) {
                return response()->json([
                    'code' => 422,
                    'status' => 'error',
                    'message' => 'tidak bisa delete data',
                ], 422);
            }
            $data->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}