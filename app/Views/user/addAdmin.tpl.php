
<?php 
    require __DIR__."/../layout/errorAlert.tpl.php" ;
?>
<h1>gestion des user</h1>
<form action="" method="POST">
    <div>
        <label for="login">Login </label>
        <input type="text" name="login" id="login" 
        placeholder="login" value="<?= $user->getLogin() ?>"> 
    </div>
    <div>
        <label for="pwd">Pwd </label>
        <input type="text" name="pwd" id="pwd" 
        placeholder="login" value="<?= $user->getPwd() ?>"> 
    </div>
    <div>
        <label for="role">Rôle de l'utilisateur</label>
        <select name="role" id="user-select">
            <option value="user">Utilisateur</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <input type="hidden" name="csrftoken" value="<?= $this->generateCSRFToken() ?>">
    <button> Valider ! </button>
</form>