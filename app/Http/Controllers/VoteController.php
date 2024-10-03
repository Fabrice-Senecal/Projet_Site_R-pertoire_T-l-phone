<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Le contrôleur VoteController gère les opérations liées aux votes des utilisateurs.
 */
class VoteController extends Controller
{

    /**
     * Récupère le nombre de votes associés à un identifiant de téléphone spécifié.
     *
     * @param int $id_telephone L'identifiant du téléphone pour lequel récupérer le nombre de votes.
     * @return int Le nombre de votes associés à l'identifiant du téléphone spécifié.
     */
    public static function getNbVoteParIdTelephone(int $id_telephone): int
    {
        return sizeof(Vote::votesParTelephoneId($id_telephone));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if (Auth::user() == null) {
            return redirect()->route('login');
        }


        if ($this->userDejaVote($request->telephone_id)) {
            $telephone = TelephoneController::getTelephoneParId($request->telephone_id);
            return redirect()->route('telephones.show', ['telephone' => $telephone]);
        }

        self::creerVote($request->telephone_id);

        $telephone = TelephoneController::getTelephoneParId($request->telephone_id);

        return redirect()->route('telephones.show',
            ['telephone' => $telephone]
        );
    }

    /**
     * Vérifie si l'utilisateur a déjà voté pour un téléphone spécifié.
     *
     * @param int $telephone_id L'identifiant du téléphone à vérifier.
     * @return bool True si l'utilisateur a déjà voté pour ce téléphone, sinon false.
     */
    public function userDejaVote(int $telephone_id): bool
    {
        if (Vote::isUserDejaVoteParId(Auth::id(), $telephone_id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Crée un nouveau vote pour un téléphone spécifié.
     *
     * @param int $id_telephone L'identifiant du téléphone pour lequel créer le vote.
     * @return void
     */
    public static function creerVote(int $id_telephone): void
    {
        $vote = new Vote();
        $vote->user_id = Auth::id();
        $vote->telephone_id = $id_telephone;
        $vote->save();
    }
}
