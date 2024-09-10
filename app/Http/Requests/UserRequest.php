<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class UserRequest extends FormRequest
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
            'user_name' => 'required',
            'user_email' => 'required|email',
            'user_age' => 'required|integer|min:18',
            'user_state_code' => 'required|max:2',
        ];
    }

    public function attributes()
    {
        return [
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'user_age' => 'User Age',
            'user_state_code' => 'User State Code',
        ];
    }
}
