<?php

namespace App\Http\Controllers\Api;

use Ramsey\Uuid\Uuid;
use App\Models\SetupModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class SetupController extends Controller
{
    public function getAllData()
    {
        $data = SetupModel::all();
        if ($data->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Data not found'
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => 'Get all data successfully',
                'data' => $data
            ]);
        }
    }

    public function createData(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'mimes:png,jpg,jpeg',
            ],
            [
                'title.required' => 'Form title tidak boleh kosong',
                'deskripsi.required' => 'Form deskripsi tidak boleh kosong',
                'gambar.mimes' => 'Gambar harus dalam format PNG, JPG, atau JPEG '
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
            $data = new SetupModel();
            $data->uuid = Uuid::uuid4()->toString();
            $data->title = $request->input('title');
            $data->deskripsi = clean($request->input('deskripsi'));
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extention = $file->getClientOriginalExtension();
                $filename = 'SETUP-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/setup/');
                $file->move(public_path('uploads/setup/'), $filename);
                $data->gambar = $filename;
            }
            $data->save();
        } catch (\Throwable $th) {
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

        $data = SetupModel::where('uuid', $uuid)->first();
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

            $data = SetupModel::where('uuid', $uuid)->first();
            if (!$data) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Data not found'
                ]);
            }

            $validation = Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'deskripsi' => 'required',
                    'gambar' => 'mimes:png,jpg,jpeg',
                ],
                [
                    'title.required' => 'Form title tidak boleh kosong',
                    'deskripsi.required' => 'Form deskripsi tidak boleh kosong',
                    'gambar.mimes' => 'Gambar harus dalam format PNG, JPG, atau JPEG '
                ]
            );

            if ($validation->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Check your validation',
                    'errors' => $validation->errors()
                ]);
            }

            $data->title = $request->input('title');
            $data->deskripsi = clean($request->input('deskripsi'));
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extention = $file->getClientOriginalExtension();
                $filename = 'SETUP-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/setup/');
                $file->move(public_path('uploads/setup/'), $filename);
                $old_file_path = public_path('uploads/setup/') . $data->gambar;
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }
                $data->gambar = $filename;
            }
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
            $data = SetupModel::where('uuid', $uuid)->first();
            if (!$data) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Data Not Found',
                ]);
            }

            $filePath = 'uploads/setup/' . $data->gambar;
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $data->delete();
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
