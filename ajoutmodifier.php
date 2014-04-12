<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enregistrement modificationt</title>
</head>

<body>
<?php
$conn=mysql_connect("localhost","root","root");
if (!$conn){die("probleme de connexion afin biha mabghach 3awtany".mysql_error());}
else{
$conn2=mysql_select_db("PFC");
if (!$conn2){die("probleme de connexion afin biha mabghach 3awtany".mysql_error());}
else{
$num_cmpt=$_POST['num_cmpt'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$add_mail=$_POST['add_mail'];
$num_tel=$_POST['num_tel'];
$req=mysql_query("update  client set nom='$nom',prenom='$prenom',add_mail='$add_mail',num_tel='$num_tel' where num_cmpt=$num_cmpt");
if(!$req){
	die("SQL ERROR : --> ".mysql_error());
	}else{echo"Toutes les Modification ont bien ete effectuées";}}}
?>
</body>
</html>