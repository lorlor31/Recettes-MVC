<?php

use recettes\Controllers\MainController as MainController;
// use recettes\Controllers\CatalogController ;
// use recettes\Controllers\ErrorController ;
// use recettes\Models\Ingredients_list ;
// use recettes\Models\Recipe ;
// use recettes\Models\Step ;
// use recettes\Models\User ;

$nameSpaceControllers='recettes\\Controllers\\' ;
//require __DIR__."/../app/Models/Ingredient.php" ;

// fichier index.php : FrontController, point d'entrée UNIQUE de notre application !

// on inclut le fichier autoload.php de Composer pour charger toutes nos dépendances
require_once __DIR__ . '/../vendor/autoload.php';
//dump($_SERVER['BASE_URI']) ;

// on instancie AltoRouter
$router = new AltoRouter();

// on doit définir le dossier dans lequel se trouve notre projet
$router->setBasePath($_SERVER['BASE_URI']);

// exemple route page d'accueil
$router->map('GET', '/', [
    'controller' => 'MainController',
    'method' => 'home'
], 'main-home');

$router->map('GET', '/home/[a:login]', [
    'controller' => 'MainController',
    'method' => 'home'
], 'main-home/');

// exemple route paramétrique
$router->map('GET', '/recettes/[i:id]', [
    'controller' => 'CatalogController',
    'method' => 'recettes'
], 'catalog-recettes');


// on demande à AltoRouter de "matcher" la requête de l'utilisateur avec les routes mappées précédemment
$match = $router->match();

// on vérifie s'il y a eu un "match" entre l'URL demandée par l'utilisateur et les routes mappées
if($match) {
    // il y a eu "match", l'URL demandée correspond à une de nos routes

    // on récupère le nom du contrôleur & le nom de la méthode
    //$controllerName = $match["target"]["controller"];
    $controllerName = $nameSpaceControllers.$match["target"]["controller"];
    $methodName = $match["target"]["method"];

    // DISPATCH
    // on instancie "dynamiquement" le bon contrôleur
    $controller = new $controllerName ($router);
    // on appelle "dynamiquement" cette méthode
    $controller->$methodName($match["params"]);

} else {
    // $match contient false, ça veut dire que l'URL demandée ne correspond à aucune de nos routes !

    // donc ... on envoie une erreur 404 !
    $controller = new ErrorController($router);
    $controller->error404();
}
