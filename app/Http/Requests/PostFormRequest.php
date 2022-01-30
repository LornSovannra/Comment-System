<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "user_post_caption" => "required|min:5|max:250"
        ];
    }

    public function messages()
    {
        return[
            "user_post_caption.required" => 'Please give a caption.',
            "user_post_caption.min" => "Caption is at least 5 characters.",
            "user_post_caption.max" => "Caption is 250 characters long."
        ];
    }
}
