<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<?php
// Démarrage de la session
session_start();
// On vérifie si le champ Login n'est pas vide.
if ($_SESSION['Login']=='')
// Si c'est le cas, le visiteur ne s'est pas loger et subit une redirection
{ echo "vous n'avez pas remplis le login !!!";   }
else
{ echo "  <a href src='Disconnect.php'> Se déconnecter </a> || Utilisateur: ". $_SESSION['Login'] ."";  }
// Test De vérification que l'user est bien dans la liste des utilisateurs Mysql
// Connexion à la base de données MySql
$DataBase = mysql_connect ( "localhost" , 'root' , '' ) ;
// Cette table contient la liste des users enregistrés.
mysql_select_db ( "mysql" , "PFC" );
// Nous allons chercher le vrai mot de passe ( crypté ) de l'utilisateur connecté
// Cryptage du mot de passe donné par l'utilsateur à la connexion par requête SQL
$Requete ="Select PASSWORD('".$_SESSION['pwd']."');";
$Resultat = mysql_query ( $Requete )  or  die(mysql_error() ) ;
while (  $ligne = mysql_fetch_array($Resultat)  )
// Le vrai mot de passe crypté est sauvergardé dans la variable $RealPasswd
{$RealPasswd=$ligne["PASSWORD('".$_SESSION['Login']. "')"];}
// Initialisation à Faux de la variable "L'utilisateur existe".
$CheckUser=False;
// On interroge la base de donnée Mysql sur le nom des users enregistrés
$Requete ="Select pwd,login From clients";
$Resultat = mysql_query ( $Requete )  or  die(mysql_error() ) ;
while (  $ligne = mysql_fetch_array($Resultat)  )
{
// Si l'utilisateur X est celui de la session
if ( $ligne['login']==$_SESSION['login'])
{
// Alors on vérifie si le mot de passe est le bon
If ($RealPasswd == $ligne['pwd'])
// Si le couple est bon, c’est que l’utilisateur est le bon.
{$CheckUser=True;}
}
}
// Si l'utilisateur n'est toujours pas valide à la fin de la lecture tableau
if ( $CheckUser==False )
// Redirection vers la fenêtre de connexion.
{Header('Location:index.html');}
?>
?>
<body>
</body>
</html>