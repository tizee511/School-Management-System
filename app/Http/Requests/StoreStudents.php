<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudents extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    protected function onCreated(){
        
        return [
            'email'=>'required|email|unique:students,email',
            'password'=>'required|min:6|max:12',
            'Name_ar' => 'required|alpha|different:Name_en',
            'Name_en' => 'required|alpha|different:Name_ar',
            'gender_id'=>'required',
            'Date_Birth'=>'required|date|date_format:Y-m-d',
            'nationalitie_id' => 'required',
            'blood_id' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ];
            
        
    }

    protected function onUpdate(){
        return [
        'email'=>'required|email|unique:students,email,'.$this->id,
            'password'=>'required|min:6|max:12',
            'Name_ar' => 'required|alpha|different:Name_en',
            'Name_en' => 'required|alpha|different:Name_ar',
            'Date_Birth'=>'required|date|date_format:Y-m-d',
            'gender_id'=>'required',
            'nationalitie_id' => 'required',
            'blood_id' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ];


    }
    public function rules(): array
    {
        return request()->isMethod('Put') || request()->isMethod('patch') ? $this->onUpdate() : $this->onCreated();
    }

    public function messages(): array
    {
        return [
            'email.required' => trans('validation.required'),
            'email.email' => trans('validation.email'),
            'email.unique' => trans('validation.unique'),

            'password.required' => trans('validation.required'),
            'password.min' => trans('validation.min'),
            'password.max' => trans('validation.max'),

            'Name_ar.required' => trans('validation.required'),
            'Name_ar.alpha' => trans('validation.alpha'),
            'Name_ar.different' => trans('validation.different'),

            'Name_en.required' => trans('validation.required'),
            'Name_en.alpha' => trans('validation.alpha'),
            'Name_en.different' => trans('validation.different'),
            
            'Date_Birth.required' => trans('validation.required'),
            'Date_Birth.date' => trans('validation.date'),

            'gender_id.required'=>trans('validation.required'),
            'nationalitie_id.required' => trans('validation.required'),
            'blood_id.required' => trans('validation.required'),
            'Grade_id.required' => trans('validation.required'),
            'Classroom_id.required' => trans('validation.required'),
            'section_id.required' => trans('validation.required'),
            'parent_id.required' => trans('validation.required'),
            'academic_year.required' => trans('validation.required'),
        ];
    }
}
