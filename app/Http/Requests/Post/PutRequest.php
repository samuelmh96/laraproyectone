<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'required|min:5|max:500',
            'slug'        => 'required|min:5|max:500|unique:posts,slug,'.$this->route("post")->id,
            'content'     => 'required|min:7',
            'category_id' => 'required|integer',
            'description' => 'required|min:7',
            'posted'      => 'required',
            'image'       => 'mimes:jpeg,jpg,png|max:10240'
        ];
    }
}
