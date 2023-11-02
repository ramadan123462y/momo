<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'section_name' => 'required|unique:sections,section_name,' . $this->id,

        ];
    }
    public function messages()
    {
        return [

            'section_name.required' => 'يرجا ادخال اسم القسم',
            'section_name.unique' => 'يرجا عدم تكرار اسم القسم',



        ];
    }
}
