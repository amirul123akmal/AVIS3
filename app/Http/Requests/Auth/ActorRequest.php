<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ActorRequest extends FormRequest
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
            'fullname' => ['required', 'string', 'max:200'],
            'icnum' => ['required', 'string', 'min:12', 'max:12', 'unique:actor,ic'],
            'phoneNumber' => ['required', 'string', 'min:8', 'max:13'],
            'address' => ['required', 'string'],
            'postcode' => ['required', 'string', 'min:5', 'max:5'],
            'stateID' => ['required', 'integer', 'min:0', 'max:15']
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required' => 'Please provide your full name.',
            'icnum.required' => 'Please enter your IC number.',
            'icnum.min' => 'The IC number must be at least 12 characters.',
            'phoneNumber.required' => 'Please enter your phone number.',
            'phoneNumber.min' => 'The phone number must be at least 8 characters.',
            'postcode.required' => 'Please enter your postcode.',
            'stateID.required' => 'Please choose a state on the page.',
            'stateID.min' => 'You need to choose a valid state.',
        ];
    }
}
