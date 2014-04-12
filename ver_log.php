<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<?
session_start();
$_SESSION['login']=$_POST[login];
$_SESSION['mdp']=$_POST[mdp];

if($_SESSION['login']=='user1' && $_SESSION['mdp']=='Aa1234' )
{echo 'authentification correcte';
	}
else {echo 'login ou mot de passe erroné'; }	
?>


<body>
</body>
</html>