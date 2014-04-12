<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Suppression</title>
</head>
<link href="style.css" rel="stylesheet" />

<script language="javascript">
function confirme(){
	var confirmation=confirm("etes vous sur de supprimer cet enregistrement");
	if(confirmation){
		document.location.href = "suppression.php;
		
	
	
	}
}
	</script>
<body>

<?php
mysql_connect("localhost","root","");
mysql_select_db("oriental");
$id=$_POST['txt'];
$req=mysql_query("select * from donnees where ID=$id ");
$NbreData = mysql_num_rows($req);
if($NbreData!=0){
echo"<center><table border=2 bordercolor=blue>";
echo"<tr><th>ID</th><th>Code Bien</th><th>Type Matériel</th><th>Désignation et description</th><th>Module</th><th>S/N</th><th>Qte</th><th>Prix</th><th>Fournisseur</th><th>Facture</th><th>Date Facture</th><th>Date d'amortissement</th><th>Affectation</th><th>Site</th></tr>";
	while($res=mysql_fetch_array($req)){	
	for($i=0;$i<=4;$i++){
		$tab[$i]=$res[$i];
		}
	echo"<tr><td>$res[0]</td><td>$res[1]</td><td>$res[2]</td><td>$res[3]</td><td>$res[4]</td><td>$res[5]</td><td>$res[6]</td><td>$res[7]</td><td>$res[8]</td><td>$res[9]</td><td>$res[10]</td><td>$res[11]</td><td>$res[12]</td><td>$res[13]</td></tr>";
	
}
echo"</center></table>";
echo"<form action=suppression.php method=post><input type=text name=id value=$tab[0]><input type=submit value=supprime  /></form>";
}else{
	echo"Le produit don't vous chercher n'existe pas";
	exit();
	}

?>

<br />


</body>
</html>