<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EquipmentNumberValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $mask;

    public function __construct($mask)
    {
        $this->mask = $mask;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $regex = strtr ($this->mask, array ('N' => '\d', 'A' => '[A-Z]', 'a' => '[a-z]', 'X'=> '[A-Z\d]', 'Z' => '[-_@]'));
        $regex = '/^' . $regex . '$/';

        if (!preg_match($regex, $value)) {
            $fail('Номер оборудования не соответствует маске.');
        }
    }
}
