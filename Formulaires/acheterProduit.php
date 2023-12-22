<?php

include('../Functions/fonctions.php');


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
 
// Check if the cart is not set
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
 
//  adding products to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product = $_POST['id'];
    $price = $_POST['price'];
 
    // Add the product to the cart
    addToCart($product, $price);
}
 
//  removing product from the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_from_cart'])) {
    $productIdToRemove = $_POST['id'];
 
    // Remove the product from the cart
    removeFromCart($productIdToRemove);
}
 
// Function to add a product to the cart
function addToCart($product, $price) {
    if (!isset($_SESSION['panier'][$product])) {
        $_SESSION['panier'][$product] = ['quantity' => 1, 'price' => $price];
    } else {
        $_SESSION['panier'][$product]['quantity']++;
    }
}
 
// Function to remove a product from the cart
function removeFromCart($product) {
    if (isset($_SESSION['panier'][$product])) {
        $_SESSION['panier'][$product]['quantity']--;
 
        // Check if quantity is zero or less
        if ($_SESSION['panier'][$product]['quantity'] <= 0) {
            unset($_SESSION['panier'][$product]);
        }
       
        // Check if the cart is empty after removing the product
        if (empty($_SESSION['panier'])) {
            unset($_SESSION['panier']);
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
        <a class="a" href="../Formulaires/inscription.php">Inscription</a>
        <a class="a" href="../Formulaires/connexion.php">Connexion</a>
        <a class="a" href="../Formulaires/panier.php">
          <?php echo countElementPanier(); ?><img src="https://images.vexels.com/media/users/3/200060/isolated/preview/e39eb7217c7b5157d2c9154564d76598-icono-de-carrito-de-compras-rosa.png" alt="Carrito de compras" class="cart-icon">
        </a>     
       
        <?php

                    
          // vérifiez si l'identifiant de rôle qui amène la session est superadmin (1)
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
<body>
   
    <div class="container mt-5">
        <h1>Votre Panier</h1>
       
        <?php
        // Display cart contents
        if (!empty($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $product => $item) {
                ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product; ?></h5>
                       
                        <?php
                        if (is_array($item) && isset($item['quantity']) && isset($item['price'])) {
                            ?>
                            <p class="card-text">Quantity: <?php echo $item['quantity']; ?></p>
                            <p class="card-text">Price: CA$<?php echo $item['price']; ?></p>
                            <form action="your_cart_page.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product; ?>">
                                <input type="submit" class="btn btn-danger" name="remove_from_cart" value="Remove">
                            </form>
                            <?php
                        }
                        ?>
                       
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>Votre panier est vide.</p>";
        }
        ?>
        <form action="paiement.php" method="post">
    <input type="hidden" name="process_payment" value="1">
    <input type="submit" class="boton" value="Payez maintenant"><br>
    <a href="../Formulaires/home.php">Ajouter un autre produit</a>
    </form>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>