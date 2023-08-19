<?php

namespace App\Http\Controllers\Api;

use Ramsey\Uuid\Uuid;
use App\Models\NewsModel;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function getAllData()
    {
        $data = NewsModel::all();
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
                 'gambar' => 'required|mimes:png,jpg,jpeg',
                 'link' => 'required|url',
                 'tgl_upload' => 'required|date',
             ],
             [
                 'title.required' => 'Form title tidak boleh kosong',
                 'deskripsi.required' => 'Form deskripsi tidak boleh kosong',
                 'gambar.required' => 'Form gambar tidak boleh kosong',
                 'gambar.mimes' => 'Gambar harus dalam format PNG, JPG, atau JPEG ',
                 
                 'link' => 'Form link tidak boleh kosong',
                 'link.url' => 'Format harus URL... !',
                 'tgl_upload' => 'Form tanggal update tidak boleh kosong',
                 'tgl_upload.date' => 'Format harus date !'
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
            $data = new NewsModel;
            $data->uuid = Uuid::uuid4()->toString();
            $data->title = clean($request->input('title'));
            $data->deskripsi = clean($request->input('deskripsi'));
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extention = $file->getClientOriginalExtension();
                $filename = 'News-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/news/');
                $file->move(public_path('uploads/news/'), $filename);
                $data->gambar = $filename;
            }
            $data->link = clean($request->input('link'));
            $data->tgl_upload = $request->input('tgl_upload');
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

        $data = NewsModel::where('uuid', $uuid)->first();
        if (!$data) {
            return response()->json([
                'code' => 400,
                'message' => 'Data not found',
            ]);
        } else {
            $data->tgl_upload = Carbon::createFromFormat('d F Y', $data->tgl_upload)->format('Y-m-d');
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

            $data = NewsModel::where('uuid', $uuid)->first();
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
                    'link' => 'required|url',
                    'tgl_upload' => 'required|date',
                ],
                [
                    'title.required' => 'Form title tidak boleh kosong',
                    'deskripsi.required' => 'Form deskripsi tidak boleh kosong',
                    'gambar.mimes' => 'Gambar harus dalam format PNG, JPG, atau JPEG ',
                    'link' => 'Form link tidak boleh kosong',
                    'link.url' => 'Format harus URL.....!',
                    'tgl_upload' => 'Form tanggal update tidak boleh kosong',
                    'tgl_upload.date' => 'Format harus date !'
                ]
            
            );

            if ($validation->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Check your validation',
                    'errors' => $validation->errors()
                ]);
            }

            $data->title = clean($request->input('title'));
            $data->deskripsi = clean($request->input('deskripsi'));
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extention = $file->getClientOriginalExtension();
                $filename = 'NEWS-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/news/');
                $file->move(public_path('uploads/news/'), $filename);
                $old_file_path = public_path('uploads/news/') . $data->gambar;
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }
                $data->gambar = $filename;
                $data->link = clean($request->input('link'));
                $data->tgl_upload = $request->input('tgl_upload');
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
                'message' => 'UUID failed',
            ]);
        }

        try {
            $data = NewsModel::where('uuid', $uuid)->first();
            if (!$data) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Data Not Found',
                ]);
            }

            $filePath = 'uploads/news/' . $data->gambar;
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
