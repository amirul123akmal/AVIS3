<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string plateNumber 
 * @property string vehicleType 
 * @property string capacity 
 * @property string description 
 * @property string status 
 **/ 

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
            'plateNumber' => 'required|string|max:8|min:4|unique:transportation,vehiclePlateNumber,NULL,transID,driverID,' . $this->user()->id . '|regex:/^[A-Za-z0-9]+$/',
            'capacity' => 'required|integer',
            'description' => 'required|string',
            'status' => 'required|exists:status,statusID',
            'vehicleType' => 'required|exists:vehicletype,vehicleID',
        ];
    }
}
