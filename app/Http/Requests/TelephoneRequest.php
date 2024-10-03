<?php

namespace App\Http\Requests;

use App\Rules\Telephone;
use Illuminate\Foundation\Http\FormRequest;

class TelephoneRequest extends FormRequest
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
            'numero_telephone' => ['required', new Telephone()],
            'description' => 'required',
        ];
    }
}
