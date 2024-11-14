<?php

namespace App\Http\Requests\UserManagement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

use function Ramsey\Uuid\v1;

class UserManagementRequest extends FormRequest
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

        if ($this->is('v1/user-management/create')) {
            $rules = [
                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'role' => 'required|in:superadmin,inventaris'
            ];
        }else {
            $rules = [
                'email' => ['required', Rule::unique('users', 'email')->ignore($this->route('id'), 'id'),],
                'password' => 'required|min:8',
                'role' => 'required|in:superadmin,inventaris'
            ];
        }
        return $rules;
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => 'not validate',
            'message' => 'check your validation',
            'data' => $validator->errors(),
        ], 422));
    }
}
