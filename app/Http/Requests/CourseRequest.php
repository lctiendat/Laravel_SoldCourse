<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required|min:5|max:1000',
            'description' => 'required|min:5|max:1000',
            'content' => 'required|min:5|max:10000',
            'price' => 'required|min:1000|integer',
            'discount' => 'required|min:1|max:99|integer',
            'thumbnail' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => trans('validation.required'),
            'name.min' => trans('validation.min'),
            'name.max' => trans('validation.max'),

            'description.required' => trans('validation.required'),
            'description.min' => trans('validation.min'),
            'description.max' => trans('validation.max'),

            'content.required' => trans('validation.required'),
            'content.min' => trans('validation.min'),
            'content.max' => trans('validation.max'),

            'price.required' => trans('validation.required'),
            'price.min' => trans('validation.min'),
            'price.max' => trans('validation.max'),

            'discount.required' => trans('validation.required'),
            'discount.min' => trans('validation.min'),
            'discount.max' => trans('validation.max'),

            'thumbnail.required' => trans('validation.required'),

        ];
    }
}
