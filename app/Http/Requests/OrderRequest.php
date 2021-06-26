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
        return [
            'fullname'=> 'required|min:1',
            'address'=> 'required|min:1',
            'phoneNumber'=> 'required|min:9',
            'email'=> 'required|min:1',
            'note'=> 'required'
        ];
    }
}
