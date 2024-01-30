<div class="main-header">
    
    <nav class="main-nav">
        <a class="backToHome" href=<?=$router->generate('main-home')?> >Retour à l'accueil </a> 
        <a class="backToHome" href=<?=$router->generate('main-home')?> >Retour à l'accueil </a> 
    </nav>

    <h1> SPEEDY RECETTES</h1>

<!-- Formulaire de connexion si pas connecté -->
    <?php if (empty($_SESSION['userObject']))  {?>
    <form action="" method="POST" class="login-form">
        <h3> "Connectez-vous !"</h3>
        <div>
            <label for="login">Login : </label>
            <input type="text" name="login" id="login" value="" placeholder="login">
        </div>
        <div>
            <label for="pwd">Password : </label>
            <input type="text" name="pwd" id="pwd">
        </div>
        <button>Connexion</button>
        <input type="hidden" name="csrftoken" value="<?= $this->generateCSRFToken() ?>">
    </form>

    <!-- Affichage de bienvenue et autres si connecté -->
    <?php } 
        else {?>
        <?php 
        //dump ($_SESSION['userObject'] ) ;
        $user=$_SESSION['userObject'] ;
        $login=$user->getLogin() ;
        $welcomeMessage="$login est connecté" ; ?>
        <div>
            <p><?=$welcomeMessage?></p>
            <a href=<?=$router->generate("main-logout")?>> Se déconnecter </a>
        </div>
    <?php }   ?>
</div>

<?php 
    if(isset($_SESSION['userObject'] )){
        if ($user->getRole()==='admin' ) {
        ?>
        <nav class="adminNav">
            <a  href=<?=$router->generate("user-list")?>> Liste </a> 
            <a  href=<?=$router->generate("user-add")?>> Ajout </a> 
        </nav>
        <?php } ?>
<?php } ?>  
            
