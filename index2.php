<?php
session_start();
if(isset($_SESSION['badlogin'])){
if($_SESSION['badlogin'] == 1){
echo "Identifiant non valide, veuillez verifier vos logins ";
}
}
?>

 
      <form action="logs.php" method="post">                 
<label for="login"><strong>Identifiant</strong></label>
<input type="text" name="identifiant" id="identifiant"/>
<label for="pass"><strong>Mot de passe</strong></label>
<input type="password" name="motdepass" id="motdepass"/>
<input type="submit" name="connexion" value="Se connecter"/>
</form>
 <form action="disconnect.php" method="post"><input type="submit" name="raz" value="Raz">  </form>
