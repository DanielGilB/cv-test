<?php

namespace App\Http\Requests\table;

use App\Http\Requests\ForceJsonResponseFormRequest;

class CreateTableRequest extends ForceJsonResponseFormRequest
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
            'minSlots' => 'required|integer|gt:0',
            'maxSlots' => 'required|integer|gt:minSlots'
        ];
    }
}
