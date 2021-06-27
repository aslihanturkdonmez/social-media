<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}
// RRMKi3kz6j-lut8zlXttj
// COpvSJSPi8-jA0tUl02gU
// lQi3aa4sYp-NqRFvyFq5V
// oFwdRI3lr7-MZOdFo8cIZ
// FeXpVbinGX-XsdDqTBgiZ
// wvsjo3Tc4k-pZ9pJnNF2q
// pDEfGIdTTf-SUzFlG9KGQ
// U8GkV8BOwG-DV9H999rHD