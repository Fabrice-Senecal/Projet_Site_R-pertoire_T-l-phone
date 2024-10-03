<?php
/**
 * @author Nicolas Fournier & Fabrice Senécal
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Le modèle User représente les utilisateurs de l'application.
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Récupère le nom de l'utilisateur associé à l'identifiant spécifié.
     *
     * @param int|null $id_user L'identifiant de l'utilisateur.
     * @return string|null Le nom de l'utilisateur s'il existe, sinon null.
     */
    public static function getNomParId(?int $id_user): Collection
    {
        return static::where('id', $id_user)->get();
    }

    /**
     * Définit la relation "hasMany" avec le modèle Telephone, indiquant que cet utilisateur peut avoir plusieurs téléphones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany La relation "hasMany" avec le modèle Telephone.
     */
    public function telephones(): HasMany
    {
        return $this->hasMany(Telephone::class);
    }

    /**
     * Définit la relation "hasMany" avec le modèle Vote, indiquant que cet utilisateur peut avoir plusieurs votes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany La relation "hasMany" avec le modèle Vote.
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * Définit la relation "hasMany" avec le modèle Commentaire, indiquant que cet utilisateur peut avoir plusieurs commentaires.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany La relation "hasMany" avec le modèle Commentaire.
     */
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }
}
