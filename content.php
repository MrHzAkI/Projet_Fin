<?php
session_start();
if(isset($_SESSION['connection'])){
if($_SESSION['connection']==1){
echo "<p>Status Session : [".$_SESSION['connection']."] - Identifie en tant que : [".$_SESSION['utilisateur']."]</p>";
echo '<p> Vous souhaitez vous <a href="disconnect.php">deconnecter ?</a></p>';
}
else{
echo "Vous n'avez pas l'autorisation de visualiser cette page.";
sleep(2);
header('Location: index2.php');
}
}
else{
echo "La page sur laquelle vous essayez d'acceder n'existe pas ou plus :)";
sleep(2);
header('Location: index2.php');
}
?>