<?php

namespace App\Http\Requests\Inventaris;


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
     * @return array<string,
     */
    public function rules(): array
    {
        return [
            'name_inventaris' => 'required',
            'stock' => ['required', 'integer', 'min:1'],
            'location_item' => 'required',
            'id_category' => 'required|uuid',
            'is_condition' => 'required|string|in:Baik,Rusak',
            'description' => 'required',
            'img_inventaris' => 'required|mimes:png,jpg,jpeg'
        ];
    }

    /**
     * Customize the response for validation failures.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => "not validate",
            'message' => 'Check your validation',
            'data' => $validator->errors(),
        ], 422));
    }
}
