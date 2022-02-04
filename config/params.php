<?php

/**
 * Fichier contenant la configuration de l'application
 */
const CONFIG = [
    'db' => [
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'smart_reader',
        'DB_USER' => 'root',
        'DB_PSWD' => '',
    ],
    'app' => [
        'name' => 'smart_reader',
        'projectBaseUrl' => 'http://localhost/smart_reader'
    ]
];

/**
 * Constantes pour accéder rapidement aux dossiers importants du MVC
 */
const BASE_DIR = __DIR__ . '\\..\\';
const BASE_PATH = CONFIG['app']['projectBaseUrl'] . '/public/index.php/';
const PUBLIC_FOLDER = BASE_DIR . 'public\\';
const VIEWS = BASE_DIR . 'views/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';
const PHOTO = BASE_DIR.'public\\upload\\';
const COVER = '../../public/upload/';

/**
 * Liste des actions/méthodes possibles (les routes du routeur)
 */
$routes = [
    // Général--------------------------------------------------------------
    ''                           => ['AppController', 'index'],
    '/qui_sommes_nous'           => ['AppController', 'who'],
    '/contact'                   => ['AppController', 'contact'],
    '/mentions_legales'          => ['AppController', 'legal'],
    '/politique_confidentialite' => ['AppController', 'rgpd'],
    '/erreur'                    => ['AppController', 'erreur'],

    // API : Livres--------------------------------------------------------------
    '/listeLivres'          => ['BookController', 'booksListing'],
    '/detailLivre'          => ['BookController', 'bookDetail'],

    // Table user : Utilisateurs--------------------------------------------------------
    '/monCompte'            => ['UserController', 'compteDetail'],
    '/modifMonCompte'       => ['UserController', 'modifCompte'],
    '/connexion'            => ['UserController', 'connexion'],
    '/inscription'          => ['UserController', 'inscription'],

    // Table et API : Offres, demandes et échanges
    '/mesOffres'            => ['ProductController', 'offersList'],
    '/supprOffre'           => ['ProductController', 'deleteOffer'],
    '/addOffre'             => ['ProductController', 'addOffer'],

    '/mesSouhaits'          => ['ProductController', 'wishList'], 
    '/supprSouhait'         => ['ProductController', 'deleteWish'],
    '/addSouhait'           => ['ProductController', 'addWish'],

    '/historique'           => ['ProductController', 'dealList'], 
    '/historiqueDetail'     => ['ProductController', 'dealDetail'], 

    // Admin


];
