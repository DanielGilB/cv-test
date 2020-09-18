<?php

namespace App\Http\Requests\booking;

use App\Http\Requests\ForceJsonResponseFormRequest;

class AvailableBookingRequest extends ForceJsonResponseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date|date_format:d-m-Y',
            'slots' => 'required|integer|gt:0'
        ];
    }
}
