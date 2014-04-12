<?php 
function authenticate(){
if (&_SERVER('PHP_AUTH_USER')!=='admin' && &_SERVER('PHP_AUTH_PW')!=='admin'){

	header("WWW-AUTHENTICATE : Basic realm=\"thetulage\"");
	header("HTTP\1.0401 Unauthorized");
	echo "there was an error";
	exit;
}	

}
?>
<html>
<body>
<h1>Here is the index page for admin</h1>
</body>
</html>