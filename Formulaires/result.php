<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Confirmation de données</title>

    <!-- Bootstrap core CSS -->
    <link href="../CSS/page_index.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../CSS/font.css">
    <link rel="stylesheet" href="../CSS/template.css">
    <link rel="stylesheet" href="../CSS/owl.css">
    <link rel="stylesheet" href="../CSS/box.css">
    <link rel="stylesheet" href="../CSS/slider.css">
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>Ceci est un site <em>HTML CSS</em> dédié aux femmes!</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                            Magasin RIVERANIS
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="#top" class="active">Accueil</a></li>
                          <li><a href="accueil.html">Accueil</a></li>
                          <li class="scroll-to-section"><a href="#apply">Des offres</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Enregistrer</a>
                              <ul class="sub-menu">
                                  <li><a href="meetings.html">Commencer la session</a></li>
                                  <li><a href="meeting-details.html">Inscription</a></li>
                              </ul>
                          </li>
                          <li class="scroll-to-section"><a href="#courses">Courses</a></li> 
                          <li class="scroll-to-section"><a href="#contact">Contactez-nous</a></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>

<?php
require_once("../Formulaires/fonctions.php");

//Attribuer des valeurs aux variables
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$utilisateur = $_POST['userid'];
$motdepasse = $_POST['motdepasse'];
$confirmation = $_POST['cmotdepasse'];
$email =$_POST['email'];
$adresse = $_POST['adresse'];
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
        echo "</br>";
        echo "Les données saisies sont :";
        echo "</br>";
        echo "</br>";
        echo "</br> Votre Nom est : " . $nom;
        echo "</br>";
        echo "</br> Votre Prenom est : " . $prenom;
        echo "</br>";
        echo "</br> Votre Utilisateur est : " . $utilisateur;
        echo "</br>";
        echo "</br> Votre Mot de Passe est : " . $encodeName;
        echo "</br>";
        echo "</br>";
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
<a href="./formulaire.php">Retour au formulaire principal</a>