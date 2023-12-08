<?php
include "../Functions/fonctions.php";

//Attribuer des valeurs aux variables
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$utilisateur = $_POST['userid'];
$motdepasse = $_POST['motdepasse'];
$confirmation = $_POST['cmotdepasse'];
$email =$_POST['email'];
$adresse = $_POST['adresse'];
$token=rand(100,1000);
$validaok=0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

   //Validation du champ Nom
    if (empty($nom)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Nom";
    }

    //Validation du champ Prénom
    if (empty($prenom)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Prenom";
    }

    //Validation du champ Utilisateur
    if (empty($utilisateur)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Utilisateur";
    }

    //Validation du champ Mot de Passe
    if (empty($motdepasse)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Mot de Passé";
    }

    //Validation du champ Confirmation Mot de Passe
    if (empty($confirmation)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Confirmation Mot de Passé";
    }

    if (empty($email)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Email";
    }

    if (empty($adresse)) {
        $errors[] = "Il est requis de compléter le champ correspondant au Adresse";
    }

    //S'il y a des champs vides, affichez un message d'erreur...
    foreach ($errors as $error) {
        echo $error . "<br>";
    }

 }    
    //Validation pour savoir si la clé est égale à la confirmation

    if ($motdepasse == $confirmation){
       $validaok=1;
    }else{
        echo ("Attention! le mot de passe saisi n'est pas le même que la confirmation, veuillez vérifier !");
    }    
     
     //Validation du nombre de caractères dans le mot de passe
      $length = strlen($motdepasse);
      if (($length < 6) || ($length > 10)){
        echo "! Votre mot de passe doit contenir entre 6 et 10 caractères, veuillez vérifier !";
      }else{
        if($validaok==1){
        echo "</br>";
        $saltedName = addSalt($_POST['motdepasse']);
        //var_dump($saltedName);
        
        //Impression de données
        $encodeName = encodeName($saltedName);
        
      }
    }


$nomLengthIsValid = nomLengthIsValid($_POST['nom']);
echo "</br>";
//var_dump($nomLengthIsValid);
if (!$nomLengthIsValid['isValid']){

}

$prenomLengthIsValid = prenomLengthIsValid($_POST['prenom']);
echo "</br>";
//var_dump($prenomLengthIsValid);
if (!$prenomLengthIsValid['isValid']){

}

$motLengthIsValid = motLengthIsValid($_POST['motdepasse']);
echo "</br>";
//var_dump($motLengthIsValid);
if (!$motLengthIsValid['isValid']){

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Magasin · Riveranis</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<form method="post" action="../Formulaires/page_login.php">
<link href="../CSS/page_index.css" rel="stylesheet"/>
</head>
<body>
<div id="templatemo_container">
  <div class="templatemo_space"></div>
  <div id="templatemo_body">
    <div id="templatemo_header">
      <div id="templatemo_site_title">Magasin <span id="templatemo_site_title2">RIVERANIS</span></div>
      <div id="templatemo_slogan">Un site réalisé par des femmes, pour les femmes !</div>
      </div>
       <div class="templatemo_link"><ul>
		 <li><a href="#">Page principal</a></li>
		 <li><a href="#">Des offres</a></li>
         <li><a href="#">Maquillage</a></li>
         <li><a href="#">Crèmes</a></li>
         <li><a href="#">Accessoires</a></li>
         <li><a href="#">Login!</a></li>
        </ul> 
    </div>
    <p>&nbsp;</p>
    <h1>!!! Félicitations !!!</h1>
    <div class="templatemo_text_area"><img src="https://img.freepik.com/vector-gratis/silueta-mujer-feliz-pelo-colores_23-2147506214.jpg" alt="templatemo.com" width="192" height="147" />
      <p>A partir de ce moment, vous faites partie de notre communauté !</p>
      <br></br>
      <br></br>
    </div>
    <button type="submit" class="boton" id="form-submit">COMMENCER SESSION</button>
    <div id="templatemo_bottom">
      <div class="templatemo_mid1">
        <h2>Vos informations</h2>
        <?php
        echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="sans-serif"><strong>NOM</strong></font> </td>
            <td>'.$nom.'</td>
            </tr>';
        echo '<tr>
            <td> <font face="sans-serif"><strong>PRÉNOM</strong></font> </td>
            <td>'.$prenom.'</td>
            </tr>';
        echo '<tr>
             <td> <font face="sans-serif"><strong>UTILISATEUR</strong></font> </td>
             <td>'.$utilisateur.'</td>
            </tr>';
        echo '<tr>
            <td> <font face="sans-serif"><strong>EMAIL</strong></font> </td>
            <td>'.$email.'</td>
            </tr>';
        echo '<tr>
            <td> <font face="sans-serif"><strong>ADRESSE</strong></font> </td>
            <td>'.$adresse.'</td>
            </tr>';
        echo '<tr>
            <td> <font face="sans-serif"><strong>TOKEN</strong></font> </td>
            <td>'.$token.'</td>
            </tr>';
        echo '<br>';
       ?>
        <br>              
        <p>&nbsp;</p>
      </div>
</body>
      

      