<?php

namespace App\Http\Controllers\API;

use Ramsey\Uuid\Uuid;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    public function getAllData()
    {
        $data = Admin::all();
        if ($data->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Data not found'
            ]);
        }else {
            return response()->json([
                'code' => 200,
                'message' => 'Get all data successfully',
                'data' =>$data
            ]);
        }

    }

    public function createData(Request $request)
    {
            $validation = Validator::make(
                $request->all(),
                [
                    'nama' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ],
                [
                    'nama.required' => 'Form nama tidak boleh kosong',
                    'email.required' => 'Form email tidak boleh kosong',
                    'password.required' => 'Form password tidak boleh kosong',
                ]
            );

            if ($validation->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Check your validation',
                    'errors' => $validation->errors()
                ]);
            }

            try {
                $data = new Admin();
                $data->uuid = Uuid::uuid4()->toString();
                $data->nama = clean($request->input('nama'));
                $data->email = clean($request->input('email'));
                $data->password = clean($request->input('password'));
                
            $data->save();
        }catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'Failed to create data',
                'errors' => $th->getMessage(),
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Create data successfully',
            'data' => $data
        ]);
    
    }

    public function getDataByUuid($uuid)
    {
        if (!Uuid::isValid($uuid)) {
            return response()->json([
                'code' => 400,
                'message' => 'Uuid is failed',
            ]);
        }

        $data = Admin::where('uuid', $uuid)->first();
        if (!$data) {
            return response()->json([
                'code' => 400,
                'message' => 'Data not found',
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => 'Get data by UUID successfully',
                'data' => $data
            ]);
        }
    }

    public function updateDataByUuid(Request $request, $uuid)
    {
        if (!Uuid::isValid($uuid)) {
            return response()->json([
                'message' => 'UUID failed'
            ]);
        }

        try {

            $data = Admin::where('uuid', $uuid)->first();
            if (!$data) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Data not found'
                ]);
            }

            $validation = Validator::make(
                $request->all(),
                [
                    'nama' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                ],
                [
                    'nama.required' => 'Form nama tidak boleh kosong',
                    'email.required' => 'Form email tidak boleh kosong',
                    'password.required' => 'Form password tidak boleh kosong'
                ]
            );

            if ($validation->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Check your validation',
                    'errors' => $validation->errors()
                ]);
            }

            $data->nama = clean($request->input('nama'));
            $data->email = clean($request->input('email'));
            $data->password = clean($request->input('password'));
            $data->save();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'Failed to update data',
                'errors' => $th->getMessage(),
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Updated data successfully',
            'data' => $data
        ]);
    }


    public function deleteData($uuid)
    {
        if (!Uuid::isValid($uuid)) {
            return response()->json([
                'code' => 404,
                'message' => 'Data Not Found',
            ]);
        }

        try {
            $data = Admin::where('uuid', $uuid)->first();
            if (!$data) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Data Not Found',
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'Failed to delete data',
                'errors' => $th->getMessage()
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Delete data successfuly'
        ]);
    }
}