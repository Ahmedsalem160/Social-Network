<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostData extends FormRequest
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
            'title'=>'required|max:5',
            'body'=>'required',
            'img' => 'mimes:jpeg,bmp,png'

        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'this Field Required',
            'post.required'=>'You should Write the body of your Post',
            'title.max'=>'You Exceed the Range of the title length',
        ];
    }
}
