<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
        $rule = [
            'file' => 'required | image | mimes:jpeg,png,jpg,gif|max:2048'
        ];

        if(request()->id)
        {

            $rule['file'] = ['required','image','mimes:jpeg,png,jpg,gif'];

        }
        return $rule;
    }

    public function messages()
    {
        return [
            'file.required'=>'Image is required',
            'file.image'=>'File must be image'
            
          
        ];
    }
}
