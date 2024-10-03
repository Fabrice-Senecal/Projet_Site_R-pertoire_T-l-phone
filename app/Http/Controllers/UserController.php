<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace App\Http\Controllers;

use App\Models\User;

/**
 * Le contrôleur UserController gère les opérations liées aux utilisateurs.
 */
class UserController extends Controller
{
    /**
     * Récupère le nom de l'utilisateur associé à l'identifiant spécifié.
     *
     * @param int|null $id_user L'identifiant de l'utilisateur.
     * @return string Le nom de l'utilisateur s'il existe, sinon "Anonyme".
     */
    public static function getNomParId(?int $id_user): string
    {
        return User::getNomParId($id_user)->first() == null ?
            "Anonyme" : User::getNomParId($id_user)->first()->name;
    }
}
