<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Telephone implements Rule
{
    /**
     * Vérifie si la valeur passée correspond au format valide d'un numéro de téléphone.
     *
     * @param string $attribute Le nom de l'attribut.
     * @param mixed $value La valeur de l'attribut à valider.
     * @return bool True si la valeur correspond au format valide d'un numéro de téléphone, sinon False.
     */
    public function passes($attribute, $value)
    {
        // Validate the telephone number format here
        return preg_match('/^\d{10,13}$/', $value);
    }

    /**
     * Récupère le message d'erreur associé à la validation du format du numéro de téléphone.
     *
     * @return string Le message d'erreur.
     */
    public function message()
    {
        return __('validation.telephone');
    }
}
