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
if(!$_SESSION['login'] && !$_SESSION['login'] )
{echo 'le champs est vide !!! retour';
header('Location:test-auth.html');
}
else if($_SESSION['login']=='admin' && $_SESSION['login']=='admin' )
{echo 'authentification correcte';
header('Location:index.html');
	}
else
{echo 'login ou mot de passe erroné';
header('Location:test-auth.html'); }	
?>

<body>
</body>
</html>