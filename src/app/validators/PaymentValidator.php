<?php

declare(strict_types=1);

namespace PersonLinks\Internship\app\validators;

class PaymentValidator extends BaseValidator
{
    /**
     * Define the validation rules for the payment form.
     *
     * @return array The validation rules.
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:1000',
            'payment_method' => 'required|enum:MTN,ORANGE',
            'description' => 'required',
            'phone' => 'required|string|size:9',
        ];
    }
}
