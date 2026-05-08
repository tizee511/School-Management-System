<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeachers extends FormRequest
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
            'Email'=>'required|unique:teachers,Email,',
            'Password'=>'required|min:6|max:12',
            'Name_ar' => 'required|alpha|different:Name_en',
            'Name_en' => 'required|alpha|different:Name_ar',
            'Specialization_id'=>'required',
            'Gender_id'=>'required',
            'Joining_Date'=>'required|date|date_format:Y-m-d',
            'Address'=>'required',
        ];
            
        
    }
    protected function onUpdate(){
        return [
            'Email'=>'required|unique:teachers,Email,'.$this->id,
            'Password'=>'required|min:6|max:12',
            'Name_ar' => 'required|alpha|different:Name_en',
            'Name_en' => 'required|alpha|different:Name_ar',
            'Specialization_id'=>'required',
            'Gender_id'=>'required',
            'Joining_Date'=>'required|date|date_format:Y-m-d',
            'Address'=>'required',
        ];
        

    }
    public function rules(): array
    {
        
        return request()->isMethod('Put') || request()->isMethod('patch') ? $this->onUpdate() : $this->onCreated();
      
    }
    public function messages(): array
    {
        return [
            'Email.required' => trans('validation.required'),
            'Email.unique' => trans('validation.unique'),
            'Password.required' => trans('validation.required'),
            'Name_ar.required' => trans('validation.required'),
            'Name_en.required' => trans('validation.required'),
            'Specialization_id.required' => trans('validation.required'),
            'Gender_id.required' => trans('validation.required'),
            'Joining_Date.required' => trans('validation.required'),
            'Address.required' => trans('validation.required'),
        ];
    }
}
