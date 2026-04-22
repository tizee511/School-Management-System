<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClassroom extends FormRequest
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
     * @return array<string,
     * \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'List_Classes' => 'required|array',
        'List_Classes.*.Name' => [
            'required',
            'string',
            'max:255',
            Rule::unique('classrooms', 'Name_class->ar')
                ->where(fn ($q) => $q->where('Grade_id', request('List_Classes.*.Grade_id'))),
        ],
        'List_Classes.*.Name_class_en' => [
            'required',
            'string',
            'max:255',
            Rule::unique('classrooms', 'Name_class->en')
                ->where(fn ($q) => $q->where('Grade_id', request('List_Classes.*.Grade_id'))),
        ],

        'List_Classes.*.Grade_id' => 'required|exists:grades,id',
    ];
    }
    public function messages(): array
    {
        return [
        'List_Classes.*.Name.required' => trans('validation.required'),
        'List_Classes.*.Name.unique'=>trans('validation.unique'),
        'List_Classes.*.Name_class_en.required' => trans('validation.required'),
        'List_Classes.*.Name_class_en.unique'=>trans('validation.unique'),
        ];
    }
}
