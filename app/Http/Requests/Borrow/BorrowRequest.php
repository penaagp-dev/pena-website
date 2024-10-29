<?php

namespace App\Http\Requests\Borrow;

use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BorrowRequest extends FormRequest
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
        if ($this->is('borrow/create')) {
            $rules = [
                'name_borrow' => 'required',
                'quantity' => 'required',
                'description' => 'required'
            ];
        }elseif($this->is('api/borrow/create')){
            $rules = [
                'name_borrow' => 'required',
                'quantity' => 'required',
                'description' => 'required'
            ];
        }else{
            $rules = [
                'name_borrow' => 'required',
                'quantity' => 'required',
                'description' => 'required'
            ];
        }
        return $rules;
    }
        
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'not validate',
            'message' => 'cek your validation',
            'data' => $validator->errors()
        ]));
    }
}
