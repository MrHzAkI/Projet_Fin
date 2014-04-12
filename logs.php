<?php
//demarrage de session
session_start();
//inclusion de la page de connexion mysql
include 'connect.php';
//test et traitement des identifiant saisi par l'utilisateur
if(!empty($_POST['identifiant']) && !empty($_POST['motdepass'])){
$identifiant = $_POST['identifiant'];
//supression de caractères indésirables type : ' " < > 
$identifiant = mysql_real_escape_string($identifiant);
$identifiant = htmlentities($identifiant);
$motdepass = $_POST['motdepass'];
$motdepass = mysql_real_escape_string($motdepass);
$motdepass = htmlentities($motdepass);
//cryptage sha1 du mot de pass
$motdepass = sha1($motdepass);


//selection de l'utilisateur et du mdp dans la base
$dbidentifiant = "SELECT identifiant, motdepass FROM login WHERE identifiant = '".$identifiant."'"." AND motdepass ='".$motdepass."'";
$result = mysql_query($dbidentifiant);
$tableaux = mysql_fetch_row($result);


//test de résultat utilisateur/Mysql
if ($identifiant == $tableaux[0] && $motdepass == $tableaux[1]){
$_SESSION['connection']=1;
$_SESSION['utilisateur']=$tableaux[0];
header('Location: content.php');  
}
else {
$_SESSION['badlogin'] = 1;
sleep(2);
header('Location: index2.php');
}
}
else{
echo "Identifiant ou mot de pass incorrect....";
$_SESSION['connection']=0;
header('Location: index2.php'); 
}
?>