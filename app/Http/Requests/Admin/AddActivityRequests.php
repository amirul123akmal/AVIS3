<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddActivityRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdating = $this->method() == 'PUT';
        return [
            'activityName' => ['required', 'string', 'max:255'],
            'activityPlace' => ['required', 'string', 'max:255'],
            'dateStart' => ['required', 'date', 'after_or_equal:today', 'before_or_equal:dateEnd'],
            'dateEnd' => ['required', 'date', 'after_or_equal:dateStart'],
            'timeStart' => ['required', 'date_format:H:i'],
            'timeEnd' => ['required', 'date_format:H:i'],
            'volunteerCount' => ['required', 'integer', 'min:0'],
            'beneficiaryCount' => ['required', 'integer', 'min:0'],
            'activityImage' => [$isUpdating ? 'sometimes' : 'required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'activityDescription' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'activityName.required' => 'Activity name is required',
            'activityPlace.required' => 'Activity place is required',
            'dateStart.required' => 'Activity date start is required',
            'dateEnd.required' => 'Activity date end is required',
            'volunteerCount.required' => 'Activity volunteer count is required',
            'beneficiaryCount.required' => 'Activity beneficiary count is required',
            'activityImage.required' => 'Activity image is required',
            'activityDescription.required' => 'Activity description is required',
            'activityImage.image' => 'Activity image must be an image',
            'activityImage.mimes' => 'Activity image must be a file of type: jpeg, png, jpg.',
            'activityImage.max' => 'Activity image may not be greater than 2048 kilobytes.',
            'dateStart.before' => 'Activity date start must be before activity date end',
            'dateEnd.after' => 'Activity date end must be after activity date start',
            'volunteerCount.integer' => 'Activity volunteer count must be an integer',
            'volunteerCount.min' => 'Activity volunteer count must be greater than 0',
            'beneficiaryCount.integer' => 'Activity beneficiary count must be an integer',
            'beneficiaryCount.min' => 'Activity beneficiary count must be greater than 0',
        ];
    }
}
