

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


    <?= require __DIR__ ."/../layout/backToHome.tpl.php"; ?>
    <nav>
    <?php foreach ($recipesList as $recipe) { ?>
        <a href=<?=$router->generate('catalog-recettes', ['id' => $recipe->getID()])?>> <?=$recipe->getTitle() ?> </a>
    <?php } ?>
    </nav>

    <div>
        <?php if (empty($_SESSION['userObject']))  {?>
        <form action="" method="POST">
            <h2> <?=
            "Connectez-vous !";?>
            </h2>
            <label for="login">Login</label>
            <input type="text" name="login" id="login" value="" placeholder="login">
            <label for="pwd">Password</label>
            <input type="text" name="pwd" id="pwd">
            <button>Connexion</button>
        </form>
    </div>
    <?php } else {?>
        <?php $user=$_SESSION['userObject'] ;
        $login=$user->getLogin() ;
        echo "$login est connecgé" ;
        ?>


        

    <?php }   ?>
    //$login=$user->getLogin();
    //echo "Vous êtes connecté en tant que $login" ;
    //dump ($login) ;
    //dump($_SESSION['userObject']);

    ?>
    