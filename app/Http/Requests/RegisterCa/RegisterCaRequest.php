<?php

namespace App\Http\Requests\RegisterCa;

use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterCaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        if ($this->is('v1/register-ca/create')) {
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:tb_registerca,email',
                'phone' => 'required',
                'date_of_birth' => 'required',
                'religion' => 'required|in:islam,kristen,hindu,budha,konghucu',
                'major' => 'required|in:Teknik informatika,Sistem informasi',
                'semester' => 'required|in:1,3',
                'gender' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'reason_register' => 'required',
                'photo' => 'required|mimes:png,jpg,jpeg'
            ];
        }else{
            $rules = [
                'name' => 'required',
                'email' => 'required|unique:tb_registerca,email,'.$this->id,
                'phone' => 'required',
                'date_of_birth' => 'required',
                'religion' => 'required|in:islam,kristen,hindu,budha,konghucu',
                'major' => 'required|in:Teknik informatika,Sistem informasi',
                'gender' => 'required',
                'semester' => 'required|in:1,3',
                'phone' => 'required',
                'address' => 'required',
                'reason_register' => 'required',
                'status' => 'required|in:pending,approved,rejected',
                'photo' => 'required|mimes:png,jpg,jpeg'
            ];
        }
        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => "not validate",
            'message' => 'Check your validation',
            'data' => $validator->errors(),
        ], 422));
    }
}
