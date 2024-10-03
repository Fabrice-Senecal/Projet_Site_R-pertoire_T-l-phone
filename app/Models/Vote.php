<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vote extends Model
{
    protected $fillable = [
    ];

    /**
     * Récupère les votes associés à un identifiant de téléphone spécifié.
     *
     * @param int $id_telephone L'identifiant du téléphone pour lequel récupérer les votes.
     * @return \Illuminate\Database\Eloquent\Collection La collection de votes associés à l'identifiant de téléphone spécifié.
     */
    static public function votesParTelephoneId(int $id_telephone): Collection
    {
        return static::where('telephone_id', $id_telephone)->get();
    }

    /**
     * Définit la relation "belongsTo" avec le modèle User, indiquant que ce commentaire appartient à un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo La relation "belongsTo" avec le modèle User.
     */
    public function users() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Définit la relation "belongsTo" avec le modèle Telephone, indiquant que ce commentaire appartient à un téléphone.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo La relation "belongsTo" avec le modèle Telephone.
     */
    public function telephones() : BelongsTo
    {
        return $this->belongsTo(Telephone::class);
    }

    /** Vérifie si un user a voté
     * @param int $idUser user
     * @param int $idTelephone telephone
     * @return bool
     */
    public static function isUserDejaVoteParId(int $idUser, int $idTelephone) : bool {
        return static::where('user_id', '=', $idUser)->where('telephone_id', '=', $idTelephone)->exists();
    }

    use HasFactory;
}
