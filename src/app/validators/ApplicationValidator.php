<?php

namespace PersonLinks\Internship\app\validators;

class ApplicationValidator extends BaseValidator
{
    /**
     * Define the validation rules for the application form.
     *
     * @return array The validation rules.
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|size:9',
            'school' => 'required',
            'referral' => 'required',
            'speciality' => 'required',
            'comments' => 'required',
        ];
    }
}
