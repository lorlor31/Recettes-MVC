<?php

namespace recettes\Controllers ;
use recettes\Models\Recipe ;
class CoreController {

public $router ;

protected function show($template,$viewData=[]) { 

    //Variables dont on a besoin partout
        
        $BASE_URL=$_SERVER['BASE_URI'];
        $router=$this->router ;
        dump($router->match());
    // Essayer d'utiliser un tabl asso ds viewData//
    // Récupération de toutes les recettes pour le menu du header       
        $recipeModel=new Recipe() ;
        $recipesList=$recipeModel->findAll();
        $viewData['recipesList']=$recipesList ;

        require __DIR__.'/../Views/header.tpl.php' ;
        require __DIR__."/../Views/$template.tpl.php" ;
        require __DIR__.'/../Views/footer.tpl.php' ;
} 

public function __construct($router, $match=[]){
    
    $this->router = $router;

    $acl = [
            //'login' => page accessible à tout le monde, donc on ne la met pas dans le tableau !
            'main-home' => ['admin', 'catalog-manager'],
            'category-list' => ['admin', 'catalog-manager'],
            // ...
            'appuser-list' => ['admin'],
            'appuser-add' => ['admin'],
            //! IL NE FAUT PAS OUBLIER DE SECURISER NOS ROUTES EN POST !
            'appuser-addpost' => ['admin']
            // ...
            // TODO : finir de sécuriser toutes les routes qui le nécessitent !
    ];

    // on peut récupérer le nom de la route actuelle grâce à $match (envoyé depuis index.php)
    $routeName = $match['name'];

    //Verification de la présence de la route ds le tableau ACL et du rôle associé
    if(array_key_exists($routeName, $acl)) {
        $this->checkAuthorization($acl[$routeName]);
    }
    //Liste des routes nécessitant un token CSRF
    $csrfRoutesToCheck = [
        'appuser-addpost', // route en POST
        'category-delete', // route en GET
        'category-homepost',
        'category-addpost'
    ];

    // on vérifie si la route actuelle nécessite une vérif CSRF
    if(in_array($routeName, $csrfRoutesToCheck)) {
        // si la route nécessite une vérif du token, on le récupère dans le formulaire 
        // en POST si c'est via un champ de formulaire en POST
        // en GET si c'est via une url en GET
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $token = filter_input(INPUT_POST, 'csrftoken');
        } else if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $token = filter_input(INPUT_GET, 'csrftoken');
        }
            
    // on le compare à celui stocké en session !
            if ($token !== $_SESSION['CSRFToken']) {
                http_response_code(403); //redirection 403
                $this->show('error/err403');   
                exit;
            }
        }
        // si la route ne nécessite pas de vérification ou que les deux tokens sont identiques, RAS.
    }

    /**
     * Cette méthode détermine si un utilisateur a le rôle approprié pour accéder à une page
     * S'il n'a pas le bon rôle (ex: s'il est catalog-manager et que seuls les admins ont le droit d'accéder à la page) on lui met un message d'erreur
     * Si l'utilisateur n'est pas connecté, on le redirige vers le form de login.
     * S'il a le bon rôle : RAS !
     * 
     * @param string[] $allowedRoles tableau contenant les rôles autorisés pour la page courante
     * @return bool
     */
    public function checkAuthorization($allowedRoles = []) 
    {
        // Si l'utilisateur est connecté, on récupère son rôle
        if(isset($_SESSION['userObject'])) {
            $role = $_SESSION['userObject']->getRole();

            // est-ce que le rôle de l'utilisateur fait partie des rôles autorisés (tabl ACL en arg ci dessus?
            if(in_array($role, $allowedRoles)) {
                return true;
            } else {
                http_response_code(403);
                $this->show('error/err403');   
                exit;
            }            
        } else {
            header("Location: " . $this->router->generate('security-login'));
            exit;
        }
    }

    /**
     * Cette méthode génère un nouveau token CSRF et le sauvegarde en session pour vérification ultérieure
     * 
     * @return string $token Le token CSRF généré que l'on va pouvoir cacher dans le formulaire
     */
    public function generateCSRFToken()
    {
        // on génère un token
        $token = bin2hex(random_bytes(32));

        // on le stocke en session
        $_SESSION['CSRFToken'] = $token;

        // on retourne le token généré
        return $token;
    }

}