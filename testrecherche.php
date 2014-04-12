<html>
<head>
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>
<style>
body{
	margin:0;
	padding:0;
	.background:#f1f1f1;
	font:70% Arial, Helvetica, sans-serif; 
	color:#555;
	line-height:150%;
	text-align:left;
}
table{
	margin-right:700px;}
a{
	text-decoration:none;
	color:#057fac;
}
a:hover{
	text-decoration:none;
	color:#999;
}
h1{
	font-size:140%;
	margin:0 20px;
	line-height:80px;	
}
h2{
	font-size:120%;
}
#container{
	margin:0 auto;
	width:680px;
	background:#fff;
	padding-bottom:20px;
}
#content{margin:10 -200px;}
p.sig{	
	margin:0 auto;
	width:680px;
	padding:1em 0;
}
form{
	margin:1em 0;
	padding:.2em 20px;
	background:#eee;
}
</style>
</head>
<body>
<div id=container>
<div id=content>
<?php
mysql_connect("localhost","root","");
mysql_select_db("oriental");
$var=$_POST['txt'];
$var2=$_POST['liste'];

if(isset($_POST['liste']) and $_POST['liste']!='null'){

 if(isset($_POST['liste']) and $_POST['liste']=='id'){
$res=mysql_query("select * from donnees where ID=$var ");
}	
else if(isset($_POST['liste']) and $_POST['liste']=='code_bien'){
	$res=mysql_query("select * from donnees where code_bien=$var ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='type'){
	$res=mysql_query("select * from donnees where type_materiel='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='desc'){
	$res=mysql_query("select * from donnees where designation_et_description='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='mod'){
	$res=mysql_query("select * from donnees where module='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='sn'){
	$res=mysql_query("select * from donnees where sn='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='qte'){
   $res=mysql_query("select * from donnees where qte='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='pr'){
	$res=mysql_query("select * from donnees where prix='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='frns'){
	$res=mysql_query("select * from donnees where fournisseur='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='fact'){
	$res=mysql_query("select * from donnees where fact='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='date_fact'){
	$res=mysql_query("select * from donnees where date_facte='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='date_amr'){
	$res=mysql_query("select * from donnees where date_amortissement='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='affect'){
	$res=mysql_query("select * from donnees where affectation='$var' ");
	}
else if(isset($_POST['liste']) and $_POST['liste']=='ste'){
	$res=mysql_query("select * from donnees where site='$var' ");
		}

	$NbreData = mysql_num_rows($res);
if($NbreData!=0){
	echo"<div id=info>vous avez cherch&eacute par l'option <u>$var2</u> et la valeur:<u>$var</u>.</div>";
	echo"<div id=print><input type=button value=Imprimer onclick=window.print()>";
	echo"<br>";
	
	echo"<table border=2 bordercolor=blue><tr><th>ID</th><th>Code Bien</th><th>Type de Materiel</th><th>Description et designation</th><th>Module</th><th>S/N</th><th>Qte</th><th>Prix</th><th>Fournisseur</th><th>Facture</th><th>Date_facture</th><th>Date_d'amortissemnt</th><th>affectation</th><th>Site</th></tr>";
	while($rese=mysql_fetch_array($res)){	
	echo"<tr><td>$rese[0]</td><td>$rese[1]</td><td>$rese[2]</td><td>$rese[3]</td><td>$rese[4]</td><td>$rese[5]</td><td>$rese[6]</td><td>$rese[7]</td><td>$rese[8]</td><td>$rese[9]</td><td>$rese[10]</td><td>$rese[11]</td><td>$rese[12]</td><td>$rese[13]</td></tr>";
}
echo"</table>";

}
else{echo"La recherche que vous venez d'effectuer mene à aucun resultat .Vueillez ressayer a nouveau ";}
}else{
	echo"<div id=erreur>veuillez<a href=recherche.php><u>selectionner une option</u></a>de la liste</div>";
	}
?>
</div></div>
<br />
<a href="recherche.php">Autre recherche</a><br />
<a href="index.html">Menu Principale</a>
</body></html>