<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BookingRequest extends Request
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

        if($this->method() == 'POST')
        {
            return [
                'from'=>'required',
                'to'=>'required',
                'room_type'=>'required',
                'contact_name'=>'required',
                'contact_number'=>'required',
                'contact_email'=>'email'
            ];
        }
    }

    public function messages()
    {
        return [
            'from.required' => 'The date booking date from is required.',
            'to.required' => 'The date booking date to is required.',
            'room_type.required' => 'Please choose your room',
        ];
    }

}
