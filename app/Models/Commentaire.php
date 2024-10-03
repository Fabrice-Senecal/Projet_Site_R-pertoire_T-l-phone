<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Le modèle Commentaire représente les commentaires associés aux téléphones.
 */
class Commentaire extends Model
{
    protected $fillable = [
        'message',
        'user_id',
        'telephone_id'
    ];

    /**
     * Récupère les commentaires associés à un identifiant de téléphone spécifié, triés par date de création décroissante.
     *
     * @param int $id_telephone L'identifiant du téléphone pour lequel récupérer les commentaires.
     * @return \Illuminate\Database\Eloquent\Collection La collection de commentaires associés à l'identifiant de téléphone spécifié.
     */
    static public function commentairesParTelephoneId(int $id_telephone): \Illuminate\Database\Eloquent\Collection
    {
        return static::where('telephone_id', $id_telephone)->orderBy('created_at', 'desc')->get();
    }

    /**
     * Définit la relation "belongsTo" avec le modèle User, indiquant que le commentaire appartient à un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo La relation "belongsTo" avec le modèle User.
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Définit la relation "belongsTo" avec le modèle Telephone, indiquant que le commentaire appartient à un téléphone.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo La relation "belongsTo" avec le modèle Telephone.
     */
    public function telephones(): BelongsTo
    {
        return $this->belongsTo(Telephone::class);
    }



    use HasFactory;
}
