

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Recettes titre à dynamiser </title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=acme:400|maitree:400|rasa:700,700i" rel="stylesheet" />
    <link rel="stylesheet" href="<?=$BASE_URL."/assets/css/recipe.css"?>">
    <link rel="stylesheet" href="<?=$BASE_URL."/assets/css/index.css"?>">



    <!-- Menu principal  -->
    <?= require __DIR__ ."/../layout/main-header.tpl.php"; ?>
    <!-- Menu des recettes  -->
    <nav>
    <?php foreach ($recipesList as $recipe) { ?>
        <a href=<?=$router->generate('catalog-recettes', ['id' => $recipe->getID()])?>> <?=$recipe->getTitle() ?> </a>
    <?php } ?>
    </nav>
    
    <nav>

    </nav>

    <!-- Formulaire de connexion si pas connecté -->
    <div id="login-form">
        <?php if (empty($_SESSION['userObject']))  {?>
        <form action="" method="POST">
            <h2> <?="Connectez-vous !";?>
            </h2>
            <label for="login">Login</label>
            <input type="text" name="login" id="login" value="" placeholder="login">
            <label for="pwd">Password</label>
            <input type="text" name="pwd" id="pwd">
            <button>Connexion</button>
            <input type="hidden" name="csrftoken" value="<?= $this->generateCSRFToken() ?>">
        </form>
    </div>

    <!-- Affichage de bienvenue et autres si connecté -->
    <?php } else {?>
        
        <?php 
        dump ($_SESSION['userObject'] ) ;
        $user=$_SESSION['userObject'] ;
        $login=$user->getLogin() ;
        echo "$login est connecté" ; ?>
        <a  href=<?=$router->generate("main-logout")?>> Se déconnecter </a>
        <?php 
            if ($user->getRole()==='admin' ) {
        ?>
        <nav>
            <a  href=<?=$router->generate("user-list")?>> Liste </a> 
            <a  href=<?=$router->generate("user-add")?>> Ajout </a> 
        </nav>
           
        <?php } ?>

    <?php }   ?>

    