<?php

namespace App\Http\Requests\Inventaris;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class InventarisRequest extends FormRequest
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

        if ($this->is('v1/inventaris-barang/create')) {
            $rules = [
                'name_inventaris' => 'required',
                'stock' => 'required',
                'location_item' => 'required',
                'id_category' => 'required|uuid',
                'status' => 'required|in:borrow,ready',
                'is_condition' => 'required|boolean',
                'description' => 'required',
                'img_inventaris' => 'required|mimes:png,jpg,jpeg'
            ];
        }else if($this->is('api/v1/inventaris-barang')){
            $rules = [
                'name_inventaris' => 'required',
                'stock' => 'required',
                'location_item' => 'required',
                'id_category' => 'required|uuid',
                'status' => 'required|in:borrow,ready',
                'is_condition' => 'required|boolean',
                'description' => 'required',
                'img_inventaris' => 'required|mimes:png,jpg,jpeg'
            ];
        }
        else{
            $rules = [
                'name_inventaris' => 'required',
                'stock' => 'required',
                'location_item' => 'required',
                'id_category' => 'required|uuid',
                'status' => 'required|in:borrow,ready',
                'is_condition' => 'required|boolean',
                'description' => 'required',
                'img_inventaris' => 'required|mimes:png,jpg,jpeg'
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
