<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlinkValidationRequest extends FormRequest
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
            //
            'webname'=>'required|max:20|min:2',
            'weburl'=>'required|url'
        ];
    }
}
