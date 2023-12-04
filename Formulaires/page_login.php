<?php
//connexion a la bd
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ecom1_project";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conn) {
    die("Echec de la connexion a la base de donne" . mysqli_connect_error());
}
//permet de vérifier si le nom d'utilisateur et le mot de passe sont les mêmes que ceux de la base de données
//isset vérifier si la variable est déclarée et qu'elle n'est pas nulle
if (isset($_POST['send'])) {
    $utilisateur = $_POST['userid'];
    $motdepasse = $_POST['motdepasse'];
    $utilisateur = mysqli_real_escape_string($conn, $utilisateur);
    $motdepasse = mysqli_real_escape_string($conn, $motdepasse);

    if (!empty($utilisateur) && !empty($motdepasse)) {


        $sql = 'SELECT * FROM user where user_name = "' . $utilisateur . '" and pwd="' . $motdepasse . '"';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            echo "L'utilisateur $utilisateur existe ";
        } else {
            echo "L'utilisateur $utilisateur n'existe pas ";

        }


    }

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Magasin · Riveranis</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../CSS/page_login.css" rel="stylesheet"/>
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
    <div id="templatemo_bottom">
      <div class="templatemo_mid1">
        <h2>Vos Données</h2>
        <br></br>
        <input name="userid" type="text" id="userid" placeholder="Entrez votre utilisateur...*" required="">
        <br></br>
        <input name="motdepasse" type="password" id="motdepasse" placeholder="Entrez votre mot de passé...*" required="">
        <br></br>
        <a href="#">¿Avez-vous perdu votre mot de passe?</a>
        <br></br>
        <button type="submit" name="send" class="boton" id="form-submit">ENVOYER</button>        
        <p>&nbsp;</p>
      </div>           
    </form>
</body>
</html>