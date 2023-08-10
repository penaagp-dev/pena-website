<?php

namespace App\Http\Controllers\API;

use Ramsey\Uuid\Uuid;
use App\Models\GaleryModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class GaleryController extends Controller
{
    public function getAllData()
    {
        $data = GaleryModel::all();
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
                'nama' => 'required',
                'jabatan' => 'required',
                'gambar' => 'required|mimes:png,jpg,jpeg',
            ],
            [
                'nama.required' => 'Form nama tidak boleh kosong',
                'jabatan.required' => 'Form jabatan tidak boleh kosong',
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
            $data = new GaleryModel();
            $data->uuid = Uuid::uuid4()->toString();
            $data->nama = clean($request->input('nama'));
            $data->jabatan = clean($request->input('jabatan'));
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extention = $file->getClientOriginalExtension();
                $filename = 'GALERY-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/galery/');
                $file->move(public_path('uploads/galery/'), $filename);
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

        $data = GaleryModel::where('uuid', $uuid)->first();
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

            $data = GaleryModel::where('uuid', $uuid)->first();
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
                    'jabatan' => 'required',
                    'gambar' => 'mimes:png,jpg,jpeg',
                ],
                [
                    'nama.required' => 'Form nama tidak boleh kosong',
                    'jabatan.required' => 'Form jabatan tidak boleh kosong',
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

            $data->nama = clean($request->input('nama'));
            $data->jabatan = clean($request->input('jabatan'));
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extention = $file->getClientOriginalExtension();
                $filename = 'GALERY-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/galery/');
                $file->move(public_path('uploads/galery/'), $filename);
                $old_file_path = public_path('uploads/galery/') . $data->gambar;
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
                'message' => 'Uuid failed',
            ]);
        }

        try {
            $data = GaleryModel::where('uuid', $uuid)->first();
            if (!$data) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Data Not Found',
                ]);
            }

            $filePath = 'uploads/galery/' . $data->gambar;
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
