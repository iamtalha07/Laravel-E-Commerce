<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'fname' => 'required | max:255',
            'lname' => 'required | max:255',
            'email'=>'required | email | max:255',
            'phone' => 'required | numeric',
            'address' => 'required | max:255',
            'payment' => 'required',
         
        ];

        return $rule;
    }

    public function messages()
    {
        return [
            'fname.required'=>'Enter your First name',
            'lname.required'=>'Enter your Last name',
            'email.required'=>'Please Enter your Email',
            'phone.required'=>'Please Enter your Phone Number',
            'address.required'=>'Please Enter your Address',
            'payment.required' => 'Please select payment type',

        ];
    }
}
