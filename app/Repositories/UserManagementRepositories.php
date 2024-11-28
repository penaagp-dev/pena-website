<?php

namespace App\Repositories;

use App\Http\Requests\UserManagement\UserManagementRequest;
use App\Interfaces\UserManagementInterface;
use App\Models\User;
use App\Traits\HttpResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

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
            $data->password = Hash::make('Admin12345678');
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
            $data->password = Hash::make('Admin12345678');
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
            return $this->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function changePassword(UserManagementRequest $request)
    {
        $data = $this->user->find(Auth::user()->id);
        $checkPassword = Hash::check($request->passwordold, $data->password);
        if (!$checkPassword) {
            return response()->json([
                'status' => 'error',
                'message' => 'password lama anda salah'
            ]);
        }
        $data->password = Hash::make($request->input('password'));
        $data->save();
        Auth::guard('web')->logout();
        return $this->success($data, 'success', 'success update password');
    }
}
