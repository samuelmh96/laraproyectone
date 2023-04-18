<?php

namespace App\Http\Requests\Category;

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
            'slug'        => 'required|min:5|max:500|unique:categories,slug,'.$this->route("category")->id,
        ];
    }
}
