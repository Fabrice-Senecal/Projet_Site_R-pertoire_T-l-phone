<?php
/**
 * @author Fabrice Senécal & Nicolas Fournier
 */

/**
 * Retourne un array association contenant les définitions française du contenu textuel pour les telephones
 */
return [
    'index' => [
        'titre' => 'Index de numéros suspicieux'
    ],
    'show' => [
        'titre' => 'Numéros suspicieux',
        'ajoutNumero' => 'Vous désirez signaler un numéro?',
        'commentairesTitre' => 'Commentaires : ',
        'descriptionTitre' => 'Description :',
        'signalerTitre' => 'Signaler par :',
        'votes' => 'votes :',
        'voter' => 'Voter',
        'signalerNumero' => 'Signaler',
        'ajoutCommentaire' => 'Envoyer un commentaire',
        'envoyer' => 'Envoyer',
        'devezEtreConnecter' => 'Vous devez être connecté',
        'login' => "Se connecter",
        'register' => "S'enregistrer",
        'aucunCommentaire' => "Aucun commentaire",
        'date' => "Date d'ajout"
    ],
    'preview' => [
        'numero_telephone' => 'Numéros suspicieux : ',
        'nom_usager_ajout' => 'Ajouter par : ',
    ],
    'create' => [
        'titre' => 'Ajouter',
        'numero_telephone' => 'Numéro à signaler',
        'description' => 'Description du numéro',
        'enregistrer' => 'Enregistrer'
    ],
    'numeroSimilaire' => [
        'titre' => 'Numéro similaire à la recherche :',
        'description' => "Le numéro recherché n'est pas présent dans notre base de donnée. Désirez vous l'ajouter?",
        'ajouter' => 'Ajouter',
    ],
    'indexPerso' => [
        'delete' => "X",
        'titre' => 'Mes numéros',
        'aucunNumero' => 'Vous avez ajouté aucun numéro',
        'ajouterNumero' => 'Ajouter',
        'titreDescription' => 'Description :'
    ]
];
