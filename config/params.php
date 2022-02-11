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

const API_KEY = "AIzaSyDAIV0lnh92aDhhOTZEkrgMcymuQR2V5q4";

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
    '/listeLivres'          => ['BookController', 'booksListing'], //OK
    '/detailLivre'          => ['BookController', 'bookDetail'], //OK

    // Table user : Utilisateurs--------------------------------------------------------
    '/monCompte'            => ['UserController', 'compteDetail'], //OK
    '/modifCompte'          => ['UserController', 'updateUser'],//OK
    '/connexion'            => ['UserController', 'connexion'],//OK
    '/inscription'          => ['UserController', 'replaceUser'],//OK
    // '/suppression'          => ['UserController', 'disabled'],
    //Déconnexion OK

    // Table dealing et API : Offres et demandes d'un utilisateur----------
    '/mesOffres'            => ['DealController', 'offersList'], //OK
    '/addOffre'             => ['DealController', 'addOffer'], //OK

    '/mesSouhaits'          => ['DealController', 'wishList'], //OK
    '/addSouhait'           => ['DealController', 'addWish'], //OK

    '/modifDeal'            => ['DealController', 'modifDeal'],//OK
    // Supression => OK

    // Table exchange, dealing et user--------------------------------------

    'allOffres'              => ['ExchangeController', 'allOffersList'],
    'allSouhaits'            => ['ExchangeController', 'allWishesList'],
    'tradeDetail'            => ['ExchangeController', 'tradeDetail'],
    'historique'             => ['ExchangeController', 'myTradesList'], 
    'historiqueDetail'       => ['ExchangeController', 'tradeDetail'], 

    // Admin
    '/listUsers'            => ['AdminController', 'usersListing'], //OK
    '/deleteUser'           => ['AdminController', 'deleteUser'], //OK
    // '/connexion'            => ['UserController', 'connexion'],//OK
    // '/inscription'          => ['UserController', 'replaceUser'],//OK


];
