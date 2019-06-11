<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name'=>'required',
            //'typedir'=>array('regex:/^[a-z0-9A-Z_]+[^\/]$/'),
            'slug'=>'required',
            'seo_title'=>'required',
            'seo_keys'=>'required',
            'seo_des'=>'required',
            'description'=>'required',
            
        ];
    }
}
