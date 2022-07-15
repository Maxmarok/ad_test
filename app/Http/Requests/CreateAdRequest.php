<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdRequest extends FormRequest
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
            'title' => 'string|required|max:200',
            'price' => 'string|required',
            'photos' => 'required|array|distinct|max:3',
            "photos.*"  => [
                'required',
                'string',
                'distinct',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            ],
            'description' => 'string|required|max:1000',
        ];
    }

    // protected function prepareForValidation()
    // {
    //     if($this->request->has('photos')){
    //         $this->merge(['photos' => implode(',', $this->request->get('photos'))]);
    //     }
    // }
}
