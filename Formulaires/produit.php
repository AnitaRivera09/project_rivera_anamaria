<?php
include "../Functions/fonctions.php";



if (session_status() == PHP_SESSION_NONE) {
  // Solo inicia la sesión si no está activa
  session_start();
}

// Verifica si el usuario está autenticado
if (isset($_SESSION['utilisateur'])) {
    $utilisateur = $_SESSION['utilisateur'];
    //var_dump ($_SESSION);
} else {
    // Si no está autenticado, redirige a la página de inicio de sesión
    header('Location: ../Formulaires/connexion.php');
    echo ("debe autenticarse");
    exit;
}

if (isset($_GET['id'])) {
    $idproduit = $_GET['id'];
    $produit = getProduitById($idproduit);

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
        <a class="a" href="../Formulaires/inscription.php">Inscription</a>
        <a class="a" href="../Formulaires/connexion.php">Connexion</a>
        <a class="a" href="../Formulaires/panier.php">
          <?php echo countElementPanier(); ?><img src="https://images.vexels.com/media/users/3/200060/isolated/preview/e39eb7217c7b5157d2c9154564d76598-icono-de-carrito-de-compras-rosa.png" alt="Carrito de compras" class="cart-icon">
        </a>     
       
        <?php

                    
          // verifica si el id role que trae la sesión es admin
          if ($utilisateur['role_id'] === 1) {
            ?>

            <a class="a" href="gestionProduits.php">Gestion Produit</a>
            <a class="a" href="ajouterProduit.php">Ajouter Produit</a>
            <a class="a" href="ajouterAdresse.php">Ajouter Adresse</a>
            <a class="a" href="gestionUsers.php">Gestion Utilisateur</a>


            <?php
          } else
           // vérifiez si l'identifiant de rôle qui amène la session est client (3)
            if ($utilisateur['role_id'] === 3) {
              ?>
  
              <a class="a" href="modifierClient.php">Modifier mes données</a>
            
              <?php
            
          }
        

        ?>
          <a class="a" href="../Formulaires/logout.php">Deconnexion</a>


      </nav>
      <?php
      echo "<h1>Bienvenue " . $utilisateur["lname"] . "!</h1>";
      ?>
    </div>

<main>
    <table>
     <tr>
      <td>   
        <section>        
            <div class="image_produit">
                <a href=<?php echo $produit['id']; ?>>
                    <?php $imag = getimage($produit['id']) ?>
                    <img src=<?php echo $imag; ?>></a>
            </div>          
    </section>
    </td>
    <td>
   <div class="col-md-6">
    <section>
      <fieldset>
            <p class="name">
                <?php echo $produit['name']; ?>
               </br>
               </br>
               </br>
            </p>
            <p class="description">
              <?php echo $produit['description']; ?>
              <form method="post" action="panier.php?id=<?php echo $produit['id']; ?>">
              </br>
               </br>
               </br>
               </p>
               <p class="price"><b>$
                    <?php echo $produit['price']; ?>
                    </b></p>
                <input type="number" name="quantite" min="0" max=<?php echo $produit['quantity']; ?>>
                <input type="submit" value="Ajouter au panier" class="boton" name="envoyer">
                <input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
              </form>  
       </fieldset>         
    </section>
</td>
</tr>
</table>
</main>
</body>

</html>