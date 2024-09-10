<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Closure;

class StudentRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
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
    public function rules(): array
    {
        return [
            // USING CUSTOM VALIDATION RULE IN FILE
            'student_name' => ['required', new Uppercase],
            // USING CLOSURE MWTHOD 
            // 'student_name' => ['required', function (string $attribute, mixed $value, Closure $fail): void {
            //     if (strtoupper($value) !== $value) {
            //         $fail("The :attribute must be in Uppercase");
            //     }
            // }],

            'student_email' => 'required|email',
            'student_age' => 'required|integer|min:18',
            'student_city' => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'student_name.required' => 'User Name is Required',
    //         'student_email.required' => 'User Email Id is Required',
    //         'student_email.email' => 'Enter the correct Email Id',
    //         'student_age.required' => 'User Age is Required',
    //         'student_age.integer' => 'User Age must be Numeric',
    //         'student_age.min' => 'User Age should not less than 18 years old',
    //         'student_city.required' => 'User City is Required',
    //     ];
    // }

    public function attributes()
    {
        return [
            'student_name' => 'Student Name',
            'student_email' => 'Student Email',
            'student_age' => 'Student Age',
            'student_city' => 'Student City',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge(
            [
                'student_city' => strtoupper($this->student_city)
            ]
        );
    }
}
