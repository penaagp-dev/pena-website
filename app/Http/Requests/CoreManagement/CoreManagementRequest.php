<?php

namespace App\Http\Requests\CoreManagement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CoreManagementRequest extends FormRequest
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
        return [
            'name' => 'required',
            'jabatan' => 'required|in:ketua_umum,waketum,seketaris,bendahara,pembina',
            'photo' => 'required|mimes:png,jpg,jpeg'
        ];
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
