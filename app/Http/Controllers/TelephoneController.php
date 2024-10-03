<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace App\Http\Controllers;

use App\Http\Requests\RechercheRequest;
use App\Http\Requests\StoreTelephoneRequest;
use App\Http\Requests\TelephoneRequest;
use App\Models\Courriels;
use App\Models\Telephone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Ramsey\Collection\Collection;

/**
 * Le contrôleur TelephoneController gère les opérations liées aux téléphones.
 */
class TelephoneController extends Controller
{
    /**
     * Récupère le nom de l'utilisateur associé au téléphone spécifié.
     *
     * @param \App\Models\Telephone $telephone Le téléphone pour lequel récupérer le nom de l'utilisateur.
     * @return string Le nom de l'utilisateur associé au téléphone.
     */
    public static function getNomUser(Telephone $telephone)
    {
        return UserController::getNomParId($telephone->user_id);
    }

    /**
     * Récupère un téléphone par son identifiant.
     *
     * @param int $id L'identifiant du téléphone à récupérer.
     * @return \App\Models\Telephone|null Le téléphone trouvé ou null s'il n'existe pas.
     */
    public static function getTelephoneParId(int $id)
    {
        return Telephone::find($id);
    }

    /**
     * Retourne la vue listant tout les télephones.
     */
    public function index(): View
    {
        $telephones = Telephone::all();

        return view('telephone.index', ['telephones' => $telephones]);
    }

    /**
     * Affiche la liste de telephone porpres à l'id de l'utilisateur connecté
     * @return View
     */
    public function indexPerso(): View
    {
        $telephones = Telephone::getTelephoneParUserId(Auth::id());

        return view('telephone.indexPerso', ['telephones' => $telephones]);
    }

    /**
     * Affiche la vue indexSimilaire avec les téléphones similaires et le numéro cherché.
     *
     * @param \Illuminate\Support\Collection $telephones La collection de téléphones similaires.
     * @param \App\Models\Telephone $numeroSimilaire Le téléphone cherché.
     * @return \Illuminate\View\View La vue indexSimilaire avec les données nécessaires.
     */
    public function indexSimilaire(Collection $telephones, Telephone $numeroSimilaire): View
    {
        return view('telephone.indexSimilaire', ['telephones' => $telephones, 'numeroCherche' => $numeroSimilaire]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TelephoneRequest $request): RedirectResponse
    {
        $attributes = $request->validated();

        $numeroInput = $request->input('numero_telephone');
        $numeroInput = $this->nettoyerNumeroTelephone($numeroInput);

        $listeNum = Telephone::getTelephonesList();
        foreach ($listeNum as $num) {
            $numClean = $this->nettoyerNumeroTelephone($num->numero_telephone);
            if ($numClean == $numeroInput) {
                return redirect()->route('telephones.show', [
                    'telephone' => Telephone::getTelephoneParNumero($num->numero_telephone)
                ]);
            }
        }

        if (Auth::user()) {
            $telephoneCreer = Auth::user()->telephones()->create($attributes);
            VoteController::creerVote($telephoneCreer->id);

        } else {
            $telephoneCreer = Telephone::create($attributes);
        }

        return redirect()->route('telephones.show', ['telephone' => $telephoneCreer]);
    }

    /**
     * Nettoie un numéro de téléphone en retirant les caractères non désirés.
     *
     * @param string $numeroTelephone Le numéro de téléphone à nettoyer.
     * @return string Le numéro de téléphone nettoyé.
     */
    public function nettoyerNumeroTelephone($numeroTelephone)
    {
        return preg_replace("/[\(\)\-\.\s\+]+/", '', $numeroTelephone);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $numeroCherche = $request->numeroCherche;
        return view('telephone.create', ['numeroCherche' => $numeroCherche]);
    }

    /**
     * Fonction controlant les vue pour la page détaillant le numéro.
     *
     * @param Telephone $telephone le numéro désiré.
     * @return View la vue.
     */
    public function show(Telephone $telephone): View
    {
        $commentaires = CommentaireController::getCommentaireParTelephoneId($telephone->id);

        return view('telephone.show', [
            'telephone' => $telephone,
            'commentaires' => $commentaires,
        ]);
    }

    /**
     * Effectue une recherche de téléphone en fonction d'un numéro spécifié.
     * Si le numéro n'est pas trouvé il retourne les 3 numéros les plus similaire.
     *
     * @param \Illuminate\Http\Request $request Les données de la requête contenant le numéro de téléphone à rechercher.
     * @return \Illuminate\Contracts\View\View Vue de la page d'affichage des résultats de la recherche.
     */
    public function recherche(RechercheRequest $request)
    {
        $attributes = $request->validated();
        $inputTelephone = $attributes['numero_telephone'];
        $numeroNettoye = $this->nettoyerNumeroTelephone($inputTelephone);

        $listeNumero = Telephone::all();
        $listeNumeroSimilaire = array();

        foreach ($listeNumero as $numero) {
            if ($numeroNettoye == $this->nettoyerNumeroTelephone($numero->numero_telephone)) {
                return redirect()->route('telephones.show', $numero->id);
            } else {
                $similarite = $this->levenshtein_similarite($numeroNettoye, $this->nettoyerNumeroTelephone($numero->numero_telephone));
                $listeNumeroSimilaire[$numero->numero_telephone] = $similarite;
            }
        }

        arsort($listeNumeroSimilaire);

        $topNumeroSimilaire = array_slice(array_keys($listeNumeroSimilaire), 0, 3);
        $topObjetNumeroSimilaire = collect();

        foreach ($topNumeroSimilaire as $numSimilaire) {

            $num = Telephone::getTelephoneParNumSimlilare($numSimilaire);
            $topObjetNumeroSimilaire = $topObjetNumeroSimilaire->merge($num);
        }

        return view('telephone.indexSimilaire', ['telephones' => $topObjetNumeroSimilaire, 'numeroCherche' => $inputTelephone]);
    }

    /**
     * Calcule la similarité entre deux numéros de téléphone en utilisant la distance de Levenshtein.
     *
     * @param string $number1 Premier numéro de téléphone.
     * @param string $number2 Deuxième numéro de téléphone.
     * @return float La similarité entre les deux numéros de téléphone (une valeur entre 0 et 1).
     */
    private function levenshtein_similarite($number1, $number2)
    {
        $longueur = max(strlen($number1), strlen($number2));
        $distance = levenshtein($number1, $number2);
        return 1 - ($distance / $longueur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Telephone $telephone)
    {
        if (TelephoneController::getNbVotesParId($telephone->id) < 10) {
            $telephone = Telephone::findOrFail($telephone->id);
            $telephone->delete();
        }

        return redirect()->route('telephones.indexPerso');
    }

    /**
     * Récupère le nombre de votes associés à un identifiant de téléphone spécifié.
     *
     * @param int $id L'identifiant du téléphone pour lequel récupérer le nombre de votes.
     * @return int Le nombre de votes associés à l'identifiant du téléphone spécifié.
     */
    public static function getNbVotesParId(int $id)
    {
        return VoteController::getNbVoteParIdTelephone($id);
    }

}
