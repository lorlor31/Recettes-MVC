
<?php

//Recupération data avec GET 
//à compléter avec SQL
class User {

    private  $id ;
    private  $name ;
    private  $pwd ;


    public function findAll(){
    $sql = 'SELECT users.* FROM users';
    $pdo = Database::getPDO();
    $pdoStatement = $pdo->query($sql);
    $usersList = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'User');
    dump($usersList) ;
    return $usersList;
    }

}


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