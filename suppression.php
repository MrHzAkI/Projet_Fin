<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Effectuer suppression</title>
</head>

<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("oriental");
$id=$_POST['id'];
$req=mysql_query("delete  from donnees where id=$id");
$req2=mysql_query("select * from donnees where id=$id");
$NbreData = mysql_num_rows($req2);
if($NbreData!=0){
	echo"impossible! requette invalide";
	}
else{
	echo"supression effectuer";
	}
?>
</body>
</html>