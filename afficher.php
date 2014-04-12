<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Afficher</title>
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>
<style>
body{
	margin:0;
	padding:0;
	background:white;
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
	margin:50 auto;
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
 img{
            	height:90px;
            	width:210px;
            	display:block;
            	cursor:pointer;
				position:Fixed;
				left:1072px;
				top:0px;
			
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
mysql_connect("localhost","root","root");
mysql_select_db("PFC");
echo"<center><table border=2 bordercolor=blue>";
echo"<tr><th>ID du client</th><th>Nom du client</th><th>prenom</th><th>l'adresse mail</th><th>numero de telephone</th><th>solde</th><th>numero du compte bancaire</th><th>la date de création</th></tr>";
$req=mysql_query("select * from client");
while($res=mysql_fetch_array($req)){
	echo"<tr><td>$res[0]</td><td>$res[1]</td><td>$res[2]</td><td>$res[3]</td><td>$res[4]</td><td>$res[5]</td><td>$res[6]</td><td>$res[7]</td><td>$res[8]</td><td>$res[9]</td><td>$res[10]</td><td>$res[11]</td><td>$res[12]</td><td>$res[13]</td></tr>";
	
}
echo"</center></table>";
?>
</div></div>
<A href="index.html"><img src="retour.jpg" align="left" alt="Retour à la page précédente"></A></div>
<br></br>
<a href="javascript:window.print()">Imprimer</a>
</html>










