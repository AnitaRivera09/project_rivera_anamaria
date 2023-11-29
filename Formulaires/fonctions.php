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

function nomLengthIsValid($nomToValid)
{
    $length = strlen($nomToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Nom correct'
    ];
    if ($length < 2){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Nom trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Nom trop long'
        ];
    }
    return $responses;
}

function prenomLengthIsValid($prenomToValid)
{
    $length = strlen($prenomToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Prenom correct'
    ];
    if ($length < 2){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Prenom trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Prenom trop long'
        ];
    }
    return $responses;
};

function motLengthIsValid($motToValid)
{
    $length = strlen($motToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Mot de Passe correct'
    ];
    if ($length < 6){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Mot de Passe trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Mot de Passe trop long'
        ];
    }
    return $responses;
}
function addSalt($nameToSalt){
  $salt ='anita123';
  $saltedName =$salt.$nameToSalt.$salt;
  return $saltedName;
};

function encodeName($saltedName){
  $encodeName = sha1($saltedName);
  return $encodeName;
}
?>
    
    <?php
    //connection a la base de données
    $server = 'localhost';
    $username ="root";
    $pwd = "";
    $db = "ecom1_project";
    $conn = mysqli_connect($server,$username,$pwd,$db);
    
    if ($conn){
        echo "<label>Connected to the $db database successfully</label>";
    }else{
        echo "<label>Error: Not connected to the $db database</label>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        ?>

        <h2>Résumé des données saisies:</h2>
        <ul>
            <?php
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $utilisateur = $_POST["userid"];
                $motdepasse = $_POST["motdepasse"];
                $confirmation =$_POST["cmotdepasse"];
                $email = $_POST["email"];
                $adresse = $_POST["adresse"];
                $token=$saltedName;


                echo '<p><strong>Nom:</strong> ' . htmlspecialchars($nom) . '</p>';
                echo '<p><strong>Prénom:</strong> ' . htmlspecialchars($prenom) . '</p>';
                echo '<p><strong>User ID:</strong> ' . htmlspecialchars($utilisateur) . '</p>';
                echo '<p><strong>Password:</strong> ' . htmlspecialchars($saltedName) . '</p>';
                echo '<p><strong>Confirmation:</strong> ' . htmlspecialchars($saltedName) . '</p>';
                echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';
                echo '<p><strong>Adresse:</strong> ' . htmlspecialchars($adresse) . '</p>';
                echo '<p><strong>Token:</strong> ' . htmlspecialchars($token) . '</p>';
                echo '<br>';



                // Insertion de données dans la base de donnéen
                $query = "INSERT INTO user VALUES (NULL,'$userid','$email','$password','$nom','$prenom','$adresse','$adresse','$token',3)";
                
                if ($conn->query($query) === TRUE) {
                    echo "<li></strong>Données enregistrées avec succès.</strong></li>";
                } else {
                    echo "Erreur lors de l'enregistrement" . $conn->error;
                }
            
        
            ?>
        </ul>
        <?php
        // fermer la conncetion
        $conn->close();
    } else {
        header("Location: index.php");
        exit();
    }
    ?>
    <button type="submit" class="btn">Retourner</button>
</body>
</html>