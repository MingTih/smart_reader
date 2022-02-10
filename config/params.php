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
const PHOTO = BASE_DIR.'public\\uploads\\';
const COVER = '../../public/uploads/';

const API_KEY = "AIzaSyAzFkhp4TZ1_TvOfKk3f7O7r3pgk2lMxFQ";

/**
 * Liste des actions/méthodes possibles (les routes du routeur)
 */
$routes = [
    // Général--------------------------------------------------------------
    ''                           => ['AppController', 'index'],
    '/qui_sommes_nous'           => ['AppController', 'who'],
    '/contact'                   => ['AppController', 'contact'],
    '/mentions_legales'          => ['AppController', 'legal'],
    '/erreur'                    => ['AppController', 'erreur'],

    // API : Livres--------------------------------------------------------------
    '/listeLivres'          => ['BookController', 'booksListing'],
    '/detailLivre'          => ['BookController', 'bookDetail'], //OK

    // Table user : Utilisateurs--------------------------------------------------------
    '/monCompte'            => ['UserController', 'compteDetail'], //OK
    '/modifCompte'          => ['UserController', 'updateUser'],//OK
    '/connexion'            => ['UserController', 'connexion'],//OK
    '/inscription'          => ['UserController', 'replaceUser'],//OK
    // '/suppression'          => ['UserController', 'disabled'],
    //Déconnexion OK
    //Suppression compte

    // Table et API : Offres, demandes et échanges
    '/mesOffres'            => ['DealController', 'offersList'], //OK
    '/supprOffre'           => ['DealController', 'deleteOffer'],
    '/addOffre'             => ['DealController', 'addOffer'], //OK

    '/mesSouhaits'          => ['DealController', 'wishList'], //OK
    '/supprSouhait'         => ['DealController', 'deleteWish'],
    '/addSouhait'           => ['DealController', 'addWish'], //OK

    '/modifDeal'            => ['DealController', 'modifDeal'],

    '/historique'           => ['ProductController', 'dealList'], 
    '/historiqueDetail'     => ['ProductController', 'dealDetail'], 

    // Admin


];
