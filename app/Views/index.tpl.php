
<?php

//Gestion login
///TODO Remplacer GET par POST qd dev terminer
$login= !empty($_GET['login']) ? $_GET['login'] : "";
$pwd= !empty($_GET['pwd']) ? $_GET['pwd'] : "";
$message="";
if(empty($login)){
    $message= "Rentrez votre login !" ;
}
else if (in_array($login, $users)==false) {
    $message= "Vous etes pas ds la bd !" ;
    $login="";
}
else {
    if(empty($pwd)){
    $message= "Rentrez votre mot de passe !" ;
    }
    else if($usersLoginID[$login]!=$pwd) {
        $message= "Mot de passe invalide!" ;
    }
    else {
        $message= "Bienvenue {$login} !" ;
    }
}
//Retour 
if(!empty($GET)){
    header("Location: index.php");
}
?>

<body>
    <a href="./datasFromDb.php">datasFromDb</a>
    <h1> SPEEDY RECETTES</h1>
    <h2> Une famille régalée sans trop (se) dépenser</h2>
    <img src="images/family-lunch.jpg" alt="family eating picture" id="index-picture">
    <form action="" method="GET">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" value=<?=$login?>>
        <label for="pwd">Password</label>
        <input type="text" name="pwd" id="pwd">
        <button>Connexion</button>
    </form>
    <p> <?=$message?></p>
