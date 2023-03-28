<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title)
        ]);
    }
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'required|min:5|max:500',
            'slug'        => 'required|min:5|max:500|unique:posts',
            'content'     => 'required|min:7',
            'category_id' => 'required|integer',
            'description' => 'required|min:7',
            'posted'      => 'required',
        ];
    }
}
