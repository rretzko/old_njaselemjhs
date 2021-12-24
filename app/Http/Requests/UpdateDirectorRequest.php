<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDirectorRequest extends FormRequest
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
            'first' => ['required'],
            'last' => ['required'],
            'email' => ['required', 'email',Rule::unique('users')->ignore($this->director->user)],
            'phone' => ['required'],
            'address1' => ['required'],
            'address2' => ['nullable'],
            'city' => ['required'],
            'state_abbr' => ['required', 'max:2'],
            'postal_code' => ['required'],
            'country' => ['required'],
            'school' => ['required'],
            'saddress1' => ['required'],
            'saddress2' => ['nullable'],
            'scity' => ['required'],
            'sstate_abbr' => ['required', 'max:2'],
            'spostal_code' => ['required'],
            'membership' => ['required'],
            'elem_student_count' => ['nullable', 'numeric'],
            'jhs_student_count' => ['nullable', 'numeric'],
        ];
    }
}
