
<?php 
    require __DIR__."/../layout/errorAlert.tpl.php" ;
?>
<h1>Rajouter un user</h1>
<form action="" method="POST">
    <div>
        <label for="login">Login </label>
        <input type="text" name="login" id="login" 
        placeholder="login" value=""> 
    </div>
    <div>
        <label for="pwd">Pwd </label>
        <input type="text" name="pwd" id="pwd" 
        placeholder="Choisissez votre mdp" value=""> 
    </div>
    
    <input type="hidden" name="csrftoken" value="<?= $this->generateCSRFToken() ?>">
    <button> Valider ! </button>
</form>