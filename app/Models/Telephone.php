<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Le modèle Telephone représente les informations d'un téléphone dans le système.
 */
class Telephone extends Model
{
    protected $fillable = [
        'numero_telephone',
        'description',
    ];
    protected $observables = [
        'numero_telephone'
    ];

    /**
     * Récupère un téléphone par son numéro.
     *
     * @param string $numeroTelephone Le numéro de téléphone à rechercher.
     * @return \App\Models\Telephone|null Le téléphone trouvé ou null s'il n'existe pas.
     */
    public static function getTelephoneParNumero(string $numeroTelephone)
    {
        return static::where('numero_telephone', $numeroTelephone)->first();
    }

    /**
     * Récupère une liste de tous les téléphones.
     *
     * @return \Illuminate\Database\Eloquent\Collection La collection de tous les téléphones.
     */
    public static function getTelephonesList()
    {
        return static::get();
    }

    /**
     * Définit la relation "belongsTo" avec le modèle User, indiquant que cet objet appartient à un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo La relation "belongsTo" avec le modèle User.
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Définit la relation "hasMany" avec le modèle Vote, indiquant que ce téléphone peut avoir plusieurs votes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany La relation "hasMany" avec le modèle Vote.
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * Définit la relation "hasMany" avec le modèle Commentaire, indiquant que ce téléphone peut avoir plusieurs commentaires.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany La relation "hasMany" avec le modèle Commentaire.
     */
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    /**
     * Obtiens la liste de téléphone d'un user
     * @param int $id id du user
     * @return mixed telephones
     */
    public static function getTelephoneParUserId(int $id)
    {
        return static::where('user_id', $id)->get();
    }

    public static function getTelephoneParNumSimlilare(String $numSimilaire)
    {
        return static::where('numero_telephone', $numSimilaire)->get();
    }

    use HasFactory;
}
