<?php

include '../Formulaires/fonctions.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Magasin Riveranis</title>
  <!-- Enlace a Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #fff;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      padding: 15px 0;
    }

    .logo {
      max-width: 150px;
    }

    .cart-icon {
      max-width: 30px;
      margin-left: 10px;
    }

    nav a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      transition: color 0.3s ease-in-out;
    }

    nav a:hover {
      color: #ff6f61;
    }
  </style>
</head>
<body>

  <header class="container">
    <div class="row align-items-center">
      <div class="col-4">
        <img src="https://img.freepik.com/vector-premium/chica-piel-hermosa-sana_73925-238.jpg?size=626&ext=jpg" class="logo img-fluid">
        <h4>
        Livraison Et Échantillons GRATUITS sur toutes les commandes toujours
      </h4>  
    </div>
      <nav class="col-8 text-right">
        <a href="#">Page Principal</a>
        <a href="#">Produits</a>
        <a href="#">Offres</a>
        <a href="#">Contactez-nous</a>
        <!-- Imagen del carrito de compras -->
        <img src="https://img.freepik.com/vector-premium/plantilla-diseno-logotipo-carrito-compras-linea_591497-178.jpg" alt="Carrito de compras" class="cart-icon">
        <a class="a" href="../Formulaires/panier.php">
          <?php echo countElementPanier(); ?>
        </a>
      </nav>
    </div>
  </header>

  <!-- Enlace a Bootstrap JS y Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>