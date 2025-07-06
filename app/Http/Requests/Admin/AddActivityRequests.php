<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $activityName
 * @property string $activityPlace
 * @property string $dateStart
 * @property string $dateEnd
 * @property string $timeStart
 * @property string $timeEnd
 * @property int $volunteerCount
 * @property int $beneficiaryCount
 * @property string $activityDescription
 * @property \Illuminate\Http\UploadedFile|null $activityImage
 * @method string method()
 * @method boolean hasfile()
 * @method \Illuminate\Http\UploadedFile|null file()
 */
class AddActivityRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array>
     */
    public function rules(): array
    {
        /** @var string $isUpdating */
        $isUpdating = $this->method() == 'PUT';
        return [
            'activityName' => ['required', 'string', 'max:255'],
            'activityPlace' => ['required', 'string', 'max:255'],
            'dateStart' => [
                'required', 
                'date', 
                'before_or_equal:dateEnd',
                function ($attribute, $value, $fail) {
                    if ($value == today()->toDateString() && now()->addHours(24)->isFuture()) {
                        $fail('The ' . $attribute . ' must be a date after today if the time is less than 24 hours from now.');
                    }
                }
            ],
            'dateEnd' => ['required', 'date', 'after_or_equal:dateStart'],
            'timeStart' => ['required', 'date_format:H:i'],
            'timeEnd' => [
                'required', 
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    $dateStart = $this->dateStart;
                    if ($dateStart && $this->timeStart && $this->timeEnd) {
                        $startDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $dateStart . ' ' . $this->timeStart);
                        $endDateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $this->dateEnd . ' ' . $this->timeEnd);
                        if ($startDateTime->isSameDay($endDateTime) && $startDateTime->greaterThanOrEqualTo($endDateTime)) {
                            $fail('The time start must be earlier than time end on the same date.');
                        }
                    }
                }
            ],
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
