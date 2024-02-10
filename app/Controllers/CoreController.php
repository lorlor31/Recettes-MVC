<?php

namespace recettes\Controllers ;
use recettes\Models\User;
use recettes\Models\Recipe ;
class CoreController {

protected $router ;

protected function show($template,$viewData=[]) { 

    //Variables dont on a besoin partout
        $BASE_URL=$_SERVER['BASE_URI'];
        $router=$this->router ;
        //dump($router->match());
        $viewData['currentPage'] = $template;//àverifier si c ok
        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';
        $viewData['baseUri'] = $_SERVER['BASE_URI'];
        extract($viewData);
        //Liste des recettes pour le menu du header
        $recipeModel=new Recipe() ;
        $recipesList=$recipeModel->findAll();
        $viewData['recipesList']=$recipesList ;

        //Gestion de l'authnetification
        function login($params) {

            /**
             * Réceptionne le formulaire de login
             */
            //    public function loginPost()
            //{
                $login = filter_input(INPUT_POST, 'login');
                $password = filter_input(INPUT_POST, 'pwd');
        
                $errors = [];
                if(is_null($login) || is_null($password)) {
                    $errors[] = "Formulaire erronné.";
                }
                if(empty($login)) {
                    // ERREUR ! le subtitle ne peut pas être vide
                    // die("Le sous-titre ne peut pas être vide !");
                    $errorList[] = "Le login ne peut pas être vide !";
                }
                if(empty($password)) {
                    // ERREUR ! le subtitle ne peut pas être vide
                    // die("Le sous-titre ne peut pas être vide !");
                    $errorList[] = "Le password ne peut pas être vide !";
                }
                $user = User::findBylogin($login);
                //dump($user->getLogin()) ;
                if($user == false) {
                    $errors[] = "Adresse email ou mot de passe incorrect.";
                } 
                else {
                    if (password_verify($password, $user->getPwd())) {
                        echo "Bienvenue". $user->getLogin()." !";
                        $_SESSION['userId'] = $user->getId();
                        $_SESSION['userObject'] = $user;
                        header("Location: " .$this->router->generate('user-space', ['login' => $user->getLogin()]));
                        exit;       
                    } 
                    else {
                        // le mot de passe fourni ne correspond pas à celui en BDD
                        //! ATTENTION : on ne doit JAMAIS préciser si c'est l'email ou le mdp qui est incorrect.
                        //die("Adresse email ou mot de passe incorrect.");
                        $errors[] = "Adresse email ou mot de passe incorrect.";
                    }
                }
            }

        require __DIR__.'/../Views/layout/header.tpl.php' ;
        require __DIR__."/../Views/$template.tpl.php" ;
        require __DIR__.'/../Views/layout/footer.tpl.php' ;
    } 
public function __construct($router, $match=[]){
    
    $this->router = $router;

    $acl = [
            //'login' => page accessible à tout le monde, donc on ne la met pas dans le tableau !
            // 'main-home' => ['admin', 'catalog-manager'],
            'user-list' => ['admin'],
            'user-update' => ['admin'],
            'user-delete' => ['admin'],
            //'user-add' => ['admin'],
            //! IL NE FAUT PAS OUBLIER DE SECURISER NOS ROUTES EN POST !
            //'user-addPost' => ['admin']
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
        //'user-addPost',
        //'user-add'
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