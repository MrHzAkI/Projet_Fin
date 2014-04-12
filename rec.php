<html>
    <head>
<style>
			#retour
			{
			heigt:100;
			width:456;
			background-image:url(tt.jpg);
			display:block;
			cursor:pointer;
			position:fixed;
			left:830px;
			top:400px;	
				}
				 body{
				background-image:url('hd.jpg');
				color:#FFF;
               
            }
		
                    
   </style>
    </head>
    <body>
    <?php
mysql_connect("localhost","root","root");
mysql_select_db("PFC");
$id=$_POST['num_cmpt'];
$req2=mysql_query("select * from client where num_cmpt=$id");
$nbrligne=mysql_num_rows($req2);
if($nbrligne!=0){
	echo $req2;
	echo"Erreur,il n'existe aucun compte avec numero de compte suivant :$id";
	}
	else{
$id=$_POST['num_cmpt'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$add_mail=$_POST['add_mail'];
$num_tel=$_POST['num_tel'];
$req=mysql_query("insert into client (nom, prenom, add_mail, num_tel) values('$nom','$prenom','$add_mail','$num_tel') where num_cmpt=$id");

      echo"<label>  Operation reussi !! </label>";
	   echo $req2;
	  
 
  }        
     ?>      
          <a href="index.html"><img src="tt.jpg" align="left" alt="Retour à la page précédente"></a>
       
    </body>
</html>
