
<?php 
    require __DIR__."/../layout/errorAlert.tpl.php" ;
?>
<h1>UPdate un user</h1>
<form action="" method="POST">
    <div>
        <label for="login">Login </label>
        <input type="text" name="login" id="login" placeholder="login" value=<?= $userToUpdate->getLogin() ?>> 
    </div>
    <div>
        <label for="pwd">Pwd </label>
        <input type="text" name="pwd" id="pwd" 
        placeholder="login" value="<?= $userToUpdate->getPwd() ?>"> 
        <p> Attention le changement de mot de passe est irrémédiable</p>
    </div>
    
    <input type="hidden" name="csrftoken" value="<?= $this->generateCSRFToken() ?>">
    <button> Valider ! </button>
</form>