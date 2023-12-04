<?php
include "../Formulaires/fonctions.php";
//conexion a la bd
$dbhost ="localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ecom1_project";

if (isset($_POST['envoyer'])) {
    //  recuperation des donnees de mon formulaire
 $nom = $_POST['nom'];
 $prenom = $_POST['prenom'];
 $utilisateur=$_POST['userid'];
 $motdepasse = $_POST['motdepasse'];
 $cmotdepasse = $_POST['cmotdepasse'];
 $email = $_POST['email'];
 
 // verification des donnees
 if(!empty($nom) && !empty($prenom) && !empty($utilisateur) && 
 !empty($email) && !empty($motdepasse) && 
 !empty($cmotdepasse)){
     if ($motdepasse === $cmotdepasse) {
         // 0. connexion a la base de donnee
        
         inscription($nom,$prenom,$utilisateur,$motdepasse, $email);
             

                    }

                }
            }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../CSS/header.css" />
  <link rel="stylesheet" href="../CSS/style.css" />
  <title>Magazin . Riveranis</title>
</head>
<body>
  <header>
    <div class="livraison">
    <div class="beauty">
      <h1>Magasin * RIVERANIS</h1>
    </div>
    <img src="https://img.freepik.com/vector-premium/chica-piel-hermosa-sana_73925-238.jpg?size=626&ext=jpg" class="logo img-fluid">
      <h4>
      Un site réalisé par des femmes, pour les femmes !
      </h4>
    </div>
    <div>
      <nav>
        <a class="a" href="../Formulaires/home.php">Page Principal</a>
        <a class="a" href="../Formulaires/panier.php">
          <?php echo countElementPanier(); ?><img src="https://images.vexels.com/media/users/3/200060/isolated/preview/e39eb7217c7b5157d2c9154564d76598-icono-de-carrito-de-compras-rosa.png" alt="Carrito de compras" class="cart-icon">
        </a>     
    
        <!-- <a class="a" href="gestionProduit.php">Gestion Produit</a>  -->

        <?php
        //verifica que la sesion no sea nula
        if (isset($_SESSION["utilisateur"])) {
          //verifica si el id role que trae la sesion es admin
          if ($_SESSION["utilisateur"]['idrole'] === 1) {
            ?>

            <a class="a" href="../Formulaires/gestionProduit.php">Gestion Produit</a>
            <a class="a" href="..Formulaires/AjouterProduit.php">Ajouter Produit</a>
            <a class="a" href="../Formulaires/gestionUsers.php">Gestioner Utilisateur</a>


            <?php
          } else {
            ?>
            <li> <a class="a" href="../naturel/Naturel.html"><i class="fa-solid fa-cart-shopping"></i></i></a>
              <?php
          }
        }

        ?>
          <a class="a" href="../Formulaires/logout.php">Deconnexion</a>
      </nav>
    </div>
<body>
<main>
     <section>
        <h1>Inscription</h1>
        <form method="post">
           <div class="container">              
                <div class="mb-3">
                  <table>
                    <tr>
                        <td>Nom</td>
                        <td><input type="text" name="nom" class="form-control" id="nom" ></td>
                    </tr>
                    <tr>
                       <td>Prenom</td>
                       <td><input type="text" name="prenom" class="form-control" id="prenom" ></td>
                    </tr>
                    <tr>
                      <td>Utilisateur</td>
                      <td><input type="text" name="utilisateur" class="form-control" id="utilisateur" ></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><input type="email" name="email" class="form-control" id="exampleInputEmail1"></td>
                    </tr>  
                    <tr>
                      <td>Adresse</td>
                      <td><input type="text" name="adresse" class="form-control" id="adresse" ></td>
                    </tr>  
                    <tr>
                       <td>Mot de passe</td>
                       <td><input type="password" name="password" class="form-control" id="exampleInputPassword1"></td>
                    </tr>
                    <tr>
                       <td>Confirmer Mot de passe</td>
                       <td><input type="password" name="c-password" class="form-control" id="exampleInputPassword1"></td>
                    </tr>
                <br>
               </table>
    </div>
    </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="envoyer" class="boton">Inscription</button>
                </div>
           
           </div>
        </form>     
    </section>
</main>
</body>
</html>