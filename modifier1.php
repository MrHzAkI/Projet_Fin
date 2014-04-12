<html>
    <head>
<style type="text/css">    


.button button{
	border:1px solid #42596d;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	color:#fff;
	font-weight:normal;
	font-size:1.2em;
	background: #1a1f24;
	background-image: -moz-radial-gradient(center,0px,center,500px,from(#42596d),to(#1a1f24));
	background-image: -webkit-gradient(radial,center top,0,center top,500,from(#42596d),to(#1a1f24));
	-webkit-transition: border .6s ease-in;
    -moz-transition: border .6s ease-in;
    -o-transition: all .6s ease-in;
    transition: all .6s ease-in;
	position:relative;
animation:myfirst 5s;
-moz-animation:myfirst 5s; 
-webkit-animation:myfirst 5s;
-o-animation:myfirst 5s;
}

.form div label{
	color:#4EA9A0;
	font-size:15px;
	font-family:
	float:left;
	margin-right:10px;
	margin-top:5px;
	text-align:right;
	display:blank;
	width:150px;
	position:relative;
animation:myfirst 5s;
-moz-animation:myfirst 5s; 
-webkit-animation:myfirst 5s;
-o-animation:myfirst 5s;
}
.form div input{
	background:#4BB5C1;
	width:350px;
	-webkit-border-radius:5px;
	-moz-border-radius:5px;
	border-radius:5px;
	border:2px solid #223645;
	height:30px;
	-webkit-transition: all .6s ease-in;
	-moz-transition: all 1s ease-in;
    -o-transition: all .6s ease-in;
    transition: all .6s ease-in;
	position:relative;
animation:myfirst 5s;
-moz-animation:myfirst 5s; 
-webkit-animation:myfirst 2s;
-o-animation:myfirst 5s;
}
.form div input:hover{
	border:1px solid red;
	
}
.form div input:focus{
	border:1px solid #42596d;
	background: #1a1f24;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#42596d', endColorstr='#1a1f24'); /* for IE */
	background-image: -moz-radial-gradient(center,0px,center,500px,from(#42596d),to(#1a1f24));
	background-image: -webkit-gradient(radial,center top,0,center top,500,from(#42596d),to(#1a1f24));
	color:#fff;
}
.form .button{
	text-align:right;
	margin-top:30px;
	margin-right:15px;
	position:relative;
animation:myfirst 2s;
-moz-animation:myfirst 2s; 
-webkit-animation:myfirst 2s;
-o-animation:myfirst 2s;
}
.form .button button{
	cursor:pointer;
	width:120px;
	height:40px;
	position:relative;
animation:myfirst 2s;
-moz-animation:myfirst 2s; 
-webkit-animation:myfirst 2s;
-o-animation:myfirst 2s;
}
.form .button button:hover{
	border:2px solid #0ACF38;
}
		    body{
				background-image:url('hd.jpg');
               
            }
          
           
			
            </style>
       
    </head>
    <body>
    <?php
mysql_connect("localhost","root","root");
mysql_select_db("oriental");
$var=$_POST['txt'];
$req=mysql_query("select * from donnees where id=$var");
$NbreData = mysql_num_rows($req);
if($NbreData!=0){
while($rese=mysql_fetch_array($req)){
	for($i=0;$i<=13;$i++){
		$tab[$i]=$rese[$i];
	}

?>
    <div class="box">
      <div id="contactFormContainer">
        <div id="contactForm">
          <form class="form" action="ajoutmodifier.php" method="post" >
           <div>
              <label for="nom2">ID </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text"  class="input" name="id" value="<?php echo $tab[0] ?>" required><br>
              <label for="nom2">Code bien </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" class="input" name="code" value="<?php echo $tab[1] ?>" required/><br>
            
              <label for="prenom">Type de materiel</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text"name="type" value="<?php echo $tab[2] ?>" required/><br>
          
              <label for="mail">Designation et description</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="desc" value="<?php echo $tab[3] ?>" required/>
           <br>
              <label for="pass">Model</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="mdl" value="<?php echo $tab[4] ?>" required>
          <br>
              <label for="passAgain">Numero de serie</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="sn" value="<?php echo $tab[5] ?>" title="" required />
            <br>
              <label for="passAgain">Quantite</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="Number"  name="qte" value="<?php echo $tab[6] ?>" title=" " required />
           <br>
              <label for="passAgain">Prix</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="prix" value="<?php echo $tab[7] ?>" title="" required />
            <br>
              <label for="passAgain">Fournisseur</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="frns" value="<?php echo $tab[8] ?>" title="" required />
          <br>
              <label for="passAgain">Facture</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="fact" value="<?php echo $tab[9] ?>" title="" required />
           <br>
              <label for="passAgain">Date-Facture</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="datet" name="dfact" value="<?php echo $tab[10] ?>" title="" required />
            <br>
              <label for="passAgain">Date-Amortissement</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="date" name="damo" value="<?php echo $tab[11] ?>" title="" required />
            <br>
            <label for="passAgain">Affectation</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text"name="affect" value="<?php echo $tab[12] ?>" title="" required />
              <br>
              <label for="passAgain">Site</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="text" name="site" value="<?php echo $tab[13] ?>" title="" required />
            </div>
            <div class="button">
              <button type="submit">Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php

}
}else{
	echo"Veuillez verifier si l'ID existe bien dans la base de données !!";
	}
?>
    </body>
</html>
