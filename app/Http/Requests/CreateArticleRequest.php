<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
           'post_title'=>'required|max:100|min:5',
            'seotitle'=>'max:255',

            'post_content'=>'required',
            // 'image'=> 'mimes:jpeg,jpg,gif,bmp,png|image'
        ];
    }

    public function messages(){
        return [
          'post_title.required' =>json_encode( ['标题不能为空'],JSON_UNESCAPED_UNICODE),
          'post_title.min' =>json_encode( ['标题最少5个字符'],JSON_UNESCAPED_UNICODE),
           'post_title.max' =>json_encode( ['标题最大100个字符'],JSON_UNESCAPED_UNICODE),
          'seotitle.max' =>json_encode( ['简略标题最大255个字符'],JSON_UNESCAPED_UNICODE),
          'post_content.required' =>json_encode( ['文档内容不能为空'],JSON_UNESCAPED_UNICODE),
        ];
    }
}
