<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\WaMail;
use App\Models\PendaftaranModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\File;


class PendaftaranController extends Controller
{
    public function getAllData()
    {
        $data = PendaftaranModel::all();
        if ($data->isEmpty()) {
            return response()->json([
                'code' => 404,
                'message' => 'Data not found'
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => 'success get all data',
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
                'tanggal_lahir' => 'required|date',
                'agama' => 'required',
                'email' => 'required|email',
                'jurusan' => 'required|in:TI,SI',
                'semester' => 'required|in:1,3',
                'jenis_kelamin' => 'required|in:L,P',
                'no_hp' => 'required|digits:12',
                'alamat' => 'required',
                'alasan_masuk' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png'
            ],
            [
                'nama.required' => 'Form nama tidak boleh kosong',
                'tanggal_lahir' => 'Form tanggal lahir tidak boleh kosong',
                'tanggal_lahir.date' => 'Format harus date !',
                'agama.required' => 'Form agama tidak boleh kosong',
                'email' => 'Form email tidak boleh kosong',
                'email.email' => 'Format harus email !',
                'jurusan.required' => 'Form jurusan tidak boleh kosong',
                'jurusan.in' => 'Jangan mengubah format yang sudah ditetapkan !',
                'semester.required' => 'Form angkatan tidak boleh kosong',
                'semester.in' => 'Jangan mengubah format semester !',
                'jenis_kelamin.required' => 'Form jenis kelamin tidak boleh kosong',
                'jenis_kelamin.in' => 'Jangan mengubah format jenis kelamin !',
                'no_hp' => 'Form nomor hp tidak boleh kosong',
                'no_hp.digits' => 'Maximal nomor 12 digit',
                'alamat.required' => 'Form alamat tidak boleh kosong',
                'alasan_masuk.required' => 'Form alasan masuk tidak boleh kosong',
                'gambar' => 'Gambar tidak boleh kosong',
                'gambar.mimes' => 'Format wajib jpg,jpeg,png'
            ]
        );

        if ($validation->fails()) {
            return response()->json([
                'code' => 422,
                'message' => 'check your validation',
                'errors' => $validation->errors()
            ]);
        }

        try {
            $data = new PendaftaranModel;
            $data->uuid = Uuid::uuid4();
            $data->nama = clean($request->input('nama'));
            $data->tanggal_lahir = $request->input('tanggal_lahir');
            $data->agama = $request->input('agama');
            $data->email = $request->input('email');
            $data->jurusan = $request->input('jurusan');
            $data->semester = $request->input('semester');
            $data->jenis_kelamin = $request->input('jenis_kelamin');
            $data->no_hp = $request->input('no_hp');
            $data->alamat = clean($request->input('alamat'));
            $data->alasan_masuk = clean($request->input('alasan_masuk'));
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extention = $file->getClientOriginalExtension();
                $filename = 'PROFILE-CA-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/ProfileCA/');
                $file->move(public_path('uploads/ProfileCA/'), $filename);
                $data->gambar = $filename;
            }
            $data->save();

            $this->sendWaLink($data);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'failed',
                'errors' => $th->getMessage()
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'success register',
            'data' => $data
        ]);
    }

    public function toLinksWa()
    {
        return redirect('https://chat.whatsapp.com/CnbFsEig9SWE9a7KEHhrtU')->with([
            'message' => 'success',
            'code' => 200
        ]);
    }

    private function sendWaLink(PendaftaranModel $pendaftaranAnggota)
    {
        $sendLink = url('api/v1/febba411-89e8-4fb3-9f55-85c56dcff41d/wa/' . $pendaftaranAnggota->email);
        Mail::to($pendaftaranAnggota->email)->send(new WaMail($sendLink));
        return response()->json([
            'code' => 200,
            'message' => 'success send link to your email'
        ]);
    }

    public function getDataByUuid($uuid)
    {
        if (!Uuid::isValid($uuid)) {
            return response()->json([
                'code' => 404,
                'message' => 'Uuid not valid'
            ]);
        }

        $data = PendaftaranModel::where('uuid', $uuid)->first();
        if (!$data) {
            return response()->json([
                'code' => 404,
                'message' => 'Data not found'
            ]);
        } else {
            $data->tanggal_lahir = Carbon::createFromFormat('d F Y', $data->tanggal_lahir)->format('Y-m-d');
            return response()->json([
                'code' => 200,
                'message' => 'Success get data',
                'data' => $data
            ]);
        }
    }

    public function updateData(Request $request, $uuid)
    {
        if (!Uuid::isValid($uuid)) {
            return response()->json([
                'message' => 'UUID failed'
            ]);
        }

        try {
            $data = PendaftaranModel::where('uuid', $uuid)->first();

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
                    'tanggal_lahir' => 'required|date',
                    'agama' => 'required',
                    'email' => 'required|email',
                    'jurusan' => 'required|in:TI,SI',
                    'semester' => 'required|in:1,3',
                    'jenis_kelamin' => 'required|in:L,P',
                    'no_hp' => 'required|digits:12',
                    'alamat' => 'required',
                    'alasan_masuk' => 'required',
                    'gambar' => 'mimes:jpg,jpeg,png'
                ],
                [
                    'nama.required' => 'Form nama tidak boleh kosong',
                    'tanggal_lahir' => 'Form tanggal lahir tidak boleh kosong',
                    'tanggal_lahir.date' => 'Format harus date !',
                    'agama.required' => 'Form agama tidak boleh kosong',
                    'email' => 'Form email tidak boleh kosong',
                    'email.email' => 'Format harus email !',
                    'jurusan.required' => 'Form jurusan tidak boleh kosong',
                    'jurusan.in' => 'Jangan mengubah format yang sudah ditetapkan !',
                    'semester.required' => 'Form angkatan tidak boleh kosong',
                    'semester.in' => 'Jangan mengubah format semester !',
                    'jenis_kelamin.required' => 'Form jenis kelamin tidak boleh kosong',
                    'jenis_kelamin.in' => 'Jangan mengubah format jenis kelamin !',
                    'no_hp' => 'Form nomor hp tidak boleh kosong',
                    'no_hp.digits' => 'Maximal nomor 12 digit',
                    'alamat.required' => 'Form alamat tidak boleh kosong',
                    'alasan_masuk.required' => 'Form alasan masuk tidak boleh kosong',
                    'gambar.mimes' => 'Format wajib jpg,jpeg,png'
                ]
            );

            if ($validation->fails()) {
                return response()->json([
                    'code' => 422,
                    'message' => 'check your validation',
                    'errors' => $validation->errors()
                ]);
            }

            $data->nama = clean($request->input('nama'));
            $data->tanggal_lahir = $request->input('tanggal_lahir');
            $data->agama = $request->input('agama');
            $data->email = $request->input('email');
            $data->jurusan = $request->input('jurusan');
            $data->semester = $request->input('semester');
            $data->jenis_kelamin = $request->input('jenis_kelamin');
            $data->no_hp = $request->input('no_hp');
            $data->alamat = clean($request->input('alamat'));
            $data->alasan_masuk = clean($request->input('alasan_masuk'));
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extention = $file->getClientOriginalExtension();
                $filename = 'PROFILE-CA-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/ProfileCA/');
                $file->move(public_path('uploads/ProfileCA/'), $filename);
                $old_file_path = public_path('uploads/ProfileCA/') . $data->gambar;
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }
                $data->gambar = $filename;
            }
            $data->save();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 400,
                'message' => 'failed',
                'errors' => $th->getMessage()
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'success update',
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
            $data = PendaftaranModel::where('uuid', $uuid)->first();
            if (!$data) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Data Not Found',
                ]);
            }

            $filePath = 'uploads/ProfileCA/' . $data->gambar;
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
            'message' => 'Delete data success'
        ]);
    }
}
