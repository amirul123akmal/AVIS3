<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TransportationRequest extends FormRequest
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
            'plateNumber' => 'required|string|max:8',
            'capacity' => 'required|integer',
            'description' => 'nullable|string',
            'status' => 'required|exists:status,statusID',
            'vehicleType' => 'required|exists:vehicletype,vehicleID',
        ];
    }
}
