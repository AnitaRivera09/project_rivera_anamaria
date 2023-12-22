<?php
include "../Functions/fonctions.php";

if (session_status() == PHP_SESSION_NONE) {
  // Solo inicia la sesión si no está activa
  session_start();
}

// Verifica si se ha enviado el formulario
if (isset($_POST['envoyer'])) {
    $utilisateur = $_POST['utilisateur'];
    $motdepasse=$_POST['motdepasse'];
    $cmotdepasse=$_POST['cmotdepasse'];
    

    if (!empty($utilisateur)||!empty($motdepasse)||!empty($cmotdepasse)) {
          
                recuperationPassword($utilisateur,$motdepasse);         

                  }
                  else{
                    echo("Le Mot de Passe et la confirmation ne sont pas les mêmes, merci de valider!"); 
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
  <table>
    <tr>
      <td rowspan="8"><img src="https://img.freepik.com/vector-gratis/fondo-plano-dia-internacional-mujer_23-2149287589.jpg?size=626&ext=jpg&ga=GA1.1.386372595.1697932800&semt=ais" width="400" height="400">
      </td>
      <td colspan="3">
          <h1>Récupération de mot de passe</h1>
        </td> 
       </tr>
     <tr>
      <td>
      <form method="post" action="">
      <fieldset> 
            <table>            
                 <tr>
                      <td>Utilisateur</td>
                      <td><input type="text" name="utilisateur" class="form-control" id="utilisateur" required ></td>
                    </tr>
                    <tr>
                       <td>Mot de passe</td>
                       <td><input type="password" name="motdepasse" class="form-control" id="motdepasse" required></td>
                    </tr>
                    <tr>
                       <td>Confirmer Mot de passe</td>
                       <td><input type="password" name="cmotdepasse" class="form-control" id="cmotdepasse"></td>
                    </tr>
                    <tr>
                      <td colspan="2"><input type="submit" value="Changer le mot de passe" class="boton" name="envoyer" required></td>
                    </tr>
            <tr>
              <td>
              <td><fieldset>
            <h3>Password must contain the following:</h3>
             <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
             <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
             <p id="number" class="invalid">A <b>number</b></p>
             <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </td></fieldset>
              </td>
            </tr> 
                <br>
               </table>
            </td>
          </tr>       
        </form>     
    </section>
  </table>
</main>
</body>
</html>