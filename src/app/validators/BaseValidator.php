<?php

namespace PersonLinks\Internship\app\validators;

use BlakvGhost\PHPValidator\Validator;
use PersonLinks\Internship\app\core\ValidationError;

abstract class BaseValidator
{
    private array $errors = [];

    // must define a function called rules
    abstract public function rules(): array;

    /**
     * Validate the data against the rules.
     *
     * @return bool True if validation passes, false otherwise.
     */
    public function isValid(array $data): bool
    {
        $validator = new Validator($data, $this->rules());
        if (! $validator->isValid()) {
            $this->errors = $validator->getErrors();
            return false;
        }
        return true;
    }

    /**
     * Get the validation errors.
     *
     * @return array The validation errors.
     */
    public function getErrors(): array
    {
        $errList = [];
        foreach ($this->errors as $key => $error) {
            $error = new ValidationError(
                field: $key,
                message: $error[0]
            );
            array_push($errList, $error);
        }
        return $errList;
    }
}
