<?php


namespace App\Repositories;

use App\Helper\EmailHandler;
use App\Helper\ImageHandler;
use App\Http\Requests\RegisterCa\RegisterCaRequest;
use App\Interfaces\RegisterCaInterfaces;
use App\Mail\registerCaMail;
use App\Models\RegisterCaModel;
use App\Traits\HttpResponseTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterCaRepositories implements RegisterCaInterfaces
{
    protected $registerCaModel;
    use HttpResponseTrait;

    public function __construct(RegisterCaModel $registerCaModel)
    {
        $this->registerCaModel = $registerCaModel;
    }

    public function getAllData()
    {
        $data = $this->registerCaModel->all();
        if($data->isEmpty()){
            return $this->dataNotFound();
        }else{
            return $this->success($data, 'success', 'success get all data register ca');
        }
    }

    public function createData(RegisterCaRequest $request)
    {
        try {
            $data = new $this->registerCaModel;
            $data->name = $request->input('name');
            $data->date_of_birth = $request->input('date_of_birth');
            $data->religion = $request->input('religion');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->major = $request->input('major');
            $data->semester = $request->input('semester');
            $data->gender = $request->input('gender');
            $data->address = $request->input('address');
            $data->reason_register = $request->input('reason_register');
            $data->status = 'pending';
            if ($request->hasFile('photo')) {
                $data->photo = ImageHandler::uploadImage($request->file('photo'), 'uploads/registerca', 'REGISTER-CA-');
            }
            $data->save();

            return $this->success($data, 'success', 'success create data register ca');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function getDataById($id)
    {
        $data = $this->registerCaModel->find($id);
        if(!$data){
            return $this->dataNotFound();
        }else{
            return $this->success($data, 'success', 'success get data register ca by id');
        }
    }

    public function updateData(RegisterCaRequest $request, $id)
    {
        try {
            $data = $this->registerCaModel->find($id);
            if(!$data){
                return $this->dataNotFound();
            }
            $data->name = $request->input('name');
            $data->date_of_birth = $request->input('date_of_birth');
            $data->religion = $request->input('religion');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->major = $request->input('major');
            $data->semester = $request->input('semester');
            $data->gender = $request->input('gender');
            $data->address = $request->input('address');
            $data->reason_register = $request->input('reason_register');
            $data->status = $request->input('status');
            if ($request->hasFile('photo')) {
                $data->photo = ImageHandler::updateImage($request->file('photo'), 'uploads/registerca', 'REGISTER-CA-', $data->photo);
            }
            $data->save();

            return $this->success($data, 'success', 'success update data register ca');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $data = $this->registerCaModel->find($id);
            if(!$data){
                return $this->dataNotFound();
            }

            $file = public_path('uploads/registerca/') . $data->photo;
            if(file_exists($file)){
                unlink($file);
            }
            $data->delete();
            return $this->delete();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function registerCaFe(RegisterCaRequest $request)
    {
        try {
            $data = new $this->registerCaModel;
            $data->name = $request->input('name');
            $data->date_of_birth = $request->input('date_of_birth');
            $data->religion = $request->input('religion');
            $data->email = $request->input('email');
            $data->phone = $request->input('phone');
            $data->major = $request->input('major');
            $data->semester = $request->input('semester');
            $data->gender = $request->input('gender');
            $data->address = $request->input('address');
            $data->reason_register = $request->input('reason_register');
            $data->status = 'pending';
            if ($request->hasFile('photo')) {
                $data->photo = ImageHandler::uploadImage($request->file('photo'), 'uploads/registerca', 'REGISTER-CA-');
            }
            $data->email_token = Str::random(32);
            $data->expires_at = Carbon::now()->addMinutes(1);
            
            $data->save();
            EmailHandler::sendWaLink($data->email, $data);

            return $this->success($data, 'success', 'success create data register ca');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }

    public function verifyEmailExp($token)
    {
        try {
            $data = $this->registerCaModel->where('email_token', $token)->first();
            if(!$data){
                return view('emails.expiredEmail');
            }

            if (!$data->expires_at || Carbon::now()->gt($data->expires_at)) {
                return view('emails.expiredEmail');
            }

            return redirect('https://google.com');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage(), 500);
        }
    }
}