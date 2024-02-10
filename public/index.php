<?php

require_once __DIR__ . '/../vendor/autoload.php';
session_start();
$nameSpaceControllers='recettes\\Controllers\\' ;



$router = new AltoRouter();

$router->setBasePath($_SERVER['BASE_URI']);

// ROUTES
$router->map('GET', '/', [
    'controller' => 'MainController',
    'method' => 'home'
], 'main-home');

$router->map('GET', '/logout', [
    'controller' => 'MainController',
    'method' => 'logout'
], 'main-logout');

$router->map('POST', '/', [
    'controller' => 'MainController',
    'method' => 'login'
], 'main-login');

// ROUTES RECETTES
$router->map('GET', '/recettes/[i:id]', [
    'controller' => 'CatalogController',
    'method' => 'recettes'
], 'catalog-recettes');

// ROUTES USER SPACES
$router->map('GET', '/user/space/[a:login]', [
    'controller' => 'UserController',
    'method' => 'space'
], 'user-space');

//ROUTES USER- BACKOFFICE

$router->map('GET', '/user/list', [
    'controller' => 'UserController',
    'method' => 'list'
], 'user-list');

$router->map('GET', '/user/add', [
    'controller' => 'UserController',
    'method' => 'add'
], 'user-add');

$router->map('POST', '/user/add', [
    'controller' => 'UserController',
    'method' => 'addPost'
], 'user-addPost');

$router->map('GET', '/user/update/[i:id]', [
    'controller' => 'UserController',
    'method' => 'update'
], 'user-update');

$router->map('POST', '/user/update/[i:id]', [
    'controller' => 'UserController',
    'method' => 'updatePost'
], 'user-updatePost');


$router->map('POST', '/user/delete/[i:id]', [
    'controller' => 'UserController',
    'method' => 'delete'
], 'user-delete');

// // ROUTES SECURITY

$router->map(
    'GET',
    '/security/login',
    [
        'method' => 'login',
        'controller' => 'SecurityController'
    ],
    'security-login'
);

$router->map(
    'POST',
    '/security/login',
    [
        'method' => 'loginPost',
        'controller' => 'SecurityController'
    ],
    'security-loginpost'
);

$router->map(
    'GET',
    '/security/logout',
    [
        'method' => 'logout',
        'controller' => 'SecurityController'
    ],
    'security-logout'
);


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
    $controller = new $controllerName ($router,$match);
    // on appelle "dynamiquement" cette méthode
    $controller->$methodName($match["params"]);

} else {
    // $match contient false, ça veut dire que l'URL demandée ne correspond à aucune de nos routes !

    // donc ... on envoie une erreur 404 !
    $errorControllerName=$nameSpaceControllers.'ErrorController';
    $controller = new $errorControllerName($router);
    $controller->error404();
}
