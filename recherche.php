<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recherche</title>
<link href="style.css" rel="stylesheet" />

</head>
	<link rel="stylesheet" media="screen" href="style.css" />

 
<body>
<form action="testrecherche.php" method=post>
<center><fieldset>
<legend><h2><u>Recherche par:</u></h2></legend>
<select name="liste" style="width:220px">
<option   value="null">---Choisissez une option---</option>
<option   value="id">ID</option>
<option value="code_bien">Code bien</option>
<option value="type">Type de Matériel</option>
<option value="desc">description et designation</option>
<option value="mod">Module</option>
<option value="sn">S/N</option>
<option value="qte">Qte</option>
<option value="pr">Prix</option>
<option value="frns">Fournisseur</option>
<option value="fact">Facture</option>
<option value="date_fact">Date_Facture</option>
<option value="date_amr">Date_Amortissement</option>
<option value="affect">Affectation</option>
<option value="ste">Site</option>
</select>
<input type="text" name="txt" placeholder="id,code bien,type_materiel..."   required/><br /><br />
<input type=submit  value="  Chercher  ">
</fieldset>
</form>
</body>
</html>
