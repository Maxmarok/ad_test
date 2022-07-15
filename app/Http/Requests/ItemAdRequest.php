<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemAdRequest extends FormRequest
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
            'id' => 'required|numeric',
            'fields' => 'sometimes|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        if($this->request->has('id')){
            $this->merge(['id' => intval($this->request->get('id'))]);
        }
    }
}
