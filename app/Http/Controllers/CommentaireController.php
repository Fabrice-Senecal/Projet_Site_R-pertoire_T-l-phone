<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace App\Http\Controllers;

use App\Http\Requests\CommentaireRequest;
use App\Models\Commentaire;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Le contrôleur CommentaireController gère les opérations liées aux commentaires.
 */
class CommentaireController extends Controller
{
    /**
     * Récupère les commentaires associés à un téléphone spécifié selon son id.
     *
     * @param int $id_telephone L'identifiant du téléphone pour lequel récupérer les commentaires.
     * @return \Generator
     */
    public static function getCommentaireParTelephoneId(int $id_telephone): \Generator
    {
        $listeCommentaires = Commentaire::commentairesParTelephoneId($id_telephone);
        $commentaires = [];

        foreach ($listeCommentaires as $commentaire) {
            yield [
                'Auteur' => UserController::getNomParId($commentaire->user_id),
                'Message' => $commentaire->message,
                'Date' => ucfirst($commentaire->created_at->diffForHumans())
            ];

        }

        return $commentaires;
    }

    /**
     * Récupère le nombre de commentaires associés à un téléphone spécifié selon son id.
     *
     * @param int $id_telephone L'identifiant du téléphone pour lequel récupérer le nombre de commentaires.
     * @return int Le nombre de commentaires associés au téléphone.
     */
    public static function getNbCommentairesParIdTelephone(int $id_telephone): int
    {
        return sizeof(Commentaire::commentairesParTelephoneId($id_telephone));
    }

    /**
     * Stocke un nouveau commentaire pour un téléphone spécifié.
     *
     * @param \Illuminate\Http\Request $request Les données de la requête.
     * @return \Illuminate\Http\RedirectResponse Redirection vers la page d'affichage du téléphone.
     */
    public function store(CommentaireRequest $request): RedirectResponse
    {
        if (Auth::user() == null) {
            return redirect()->route('login');
        }

        $attributes = $request->validated();

        Auth::user()->commentaires()->create($attributes);


        $telephone = TelephoneController::getTelephoneParId($request->telephone_id);

        return redirect()->route('telephones.show',
            ['telephone' => $telephone]
        );
    }

}
