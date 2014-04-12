<html>
<style>
body{
	background-image:url(bg.png);
	font-family: 'Oleo Script', cursive;
}

.lg-container{
	width:275px;
	margin:100px auto;
	padding:20px 40px;
	border:1px solid #f4f4f4;
	background:rgba(255,255,255,.5);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
	
	-webkit-box-shadow: 0 0 2px #aaa;
	-moz-box-shadow: 0 0 2px #aaa;
	box-shadow: 0 0 2px #aaa;
}
.lg-container h1{
	font-size:40px;
	text-align:center;
}
#lg-form > div {
	margin:10px 5px;
	padding:5px 0;
}
#lg-form label{
	display: none;
	font-size: 20px;
	line-height: 25px;
}
#lg-form input[type="text"],
#lg-form input[type="password"]{
	border:1px solid rgba(51,51,51,.5);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
	padding: 5px;
	font-size: 16px;
	line-height: 20px;
	width: 100%;
	font-family: 'Oleo Script', cursive;
	text-align:center;
}
#lg-form div:nth-child(3) {
	text-align:center;
}
#lg-form button{
	font-family: 'Oleo Script', cursive;
	font-size: 18px;
	border:1px solid #000;
	padding:5px 10px;
	border:1px solid rgba(51,51,51,.5);
	-webkit-border-radius:10px;
	-moz-border-radius:10px;
	border-radius:10px;
	
	-webkit-box-shadow: 2px 1px 1px #aaa;
	-moz-box-shadow: 2px 1px 1px #aaa;
	box-shadow: 2px 1px 1px #aaa;
	cursor:pointer;
}
#lg-form button:active{
	-webkit-box-shadow: 0px 0px 1px #aaa;
	-moz-box-shadow: 0px 0px 1px #aaa;
	box-shadow: 0px 0px 1px #aaa;
}
#lg-form button:hover{
	background:#f4f4f4;
}
#message{width:100%;text-align:center}
.success {
	color: green;
}
.error {
	color: red;
}
</style>
	
<body>

<?php
$tab=array("user1"=>"user1","user2"=>"user2","user3"=>"user3");
if(empty($_POST['nom']) && empty($_POST['passe']))
{
 echo " <div class=lg-container>
		<h1>Zone d'administrateur</h1>
		<form action=protection.php id=lg-form name=lg-form method=post>
			
		<div>
				<label for=username>Nom d'utilisateur:</label>
				<input type=text name=nom id=username placeholder='Nom d utilisateur' />
			</div>
			
			<div>
				<label for=password>Mot de passe:</label>
				<input type=password name=passe id=password placeholder='Mot de passe' />
			</div>
			
			<div>				
				<button type=submit id=login>S'authentifier</button>
			</div>
			<div id=message></div>
	</div>
			
		</form>
		";}
else{
while(list($m,$p)=each($tab)){
if($_POST['nom']==$m && $_POST['passe']==$p){
header("location: index.html");
}}
echo"<div id=erreurlogin><h1><center><u></br></br></br>La combinaison login/password est incorrecte !!!</u></center><h1></div>";
echo"<center><h1><a href='protection.php'>Retour</a></h1></center><br>";
}?>

    </body></html>