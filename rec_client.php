
<?php
$conn=mysql_connect("localhost","root","root");
if(!$conn){die("ERROR : -->  ".mysql_error());}
else{
$select=mysql_select_db("PFC");
if(!$select){die("ERROR : -->  ".mysql_error());}
else{
$id=$_POST['num_cmpt'];
$req2=mysql_query("select * from client where num_cmpt=$id");
if(!$req2){
	header('Location : auth-css.html?Erreur=account_number_not_found)';
}
else if ($_POST['mdp'] != $_Post['mdp_conf']) {
	header('Location : auth-css.html?Erreur=password_not_match');
}
else{
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$add_mail=htmlspecialchars($_POST['add_mail']);
$num_tel=htmlspecialchars($_POST['num_tel']);
$req=$bdd->prepare('INSERT INTO client(nom, prenom, add_mail, num_tel) values(:nom,:prenom,:add_mail,:num_tel) where num_cmpt=:id');
$req->execute(array(
	'nom' => $nom,
	'prenom' => $prenom,
	'add_mail' => $add_mail,
	'num_tel' => $num_tel,
	'id' => $id
	  ));
	$req->closeCursor();
	header('Location : auth-css.html?Info=registred');
  }} }      
     ?>      
