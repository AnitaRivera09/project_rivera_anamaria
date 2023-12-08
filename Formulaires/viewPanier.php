<?php
include "../Functions/fonctions.php";
if (isset($_GET['id'])) {
    $id_produit = $_GET['id'];
    $produit = getProduitById($id_produit);

}
if (isset($_POST['ajouterPanier'])) {
    $quantiteDemander = $_POST['quantiteD'];
    addCard($id, $quantiteDemander);
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
      </nav>
    </div>
    <section>
        <h1>Modifier </h1>

        <form method="post">

            <div class="mb-3">
                <label for="nom_produit" class="form-label">Nom produit</label>
                <input type="text" name="nom_produit" class="form-control"
                    value="<?php echo $produit['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" name="prix" class="form-control" value="<?php echo $produit['price']; ?>">
            </div>
            <div class="mb-3">
                <label for="quantite" class="form-label">Quantite</label>
                <input type="number" name="quantite" class="form-control" value="<?php echo $produit['quantity']; ?>">
            </div>
            <div class="mb-3">
                <label for="quantiteD" class="form-label">Quantite Demander</label>
                <input type="number" name="quantiteD" class="form-control" max="<?php echo $produit['quantiteyD']; ?>">
            </div>
            <label for="descreption" class="form-label">Description</label>
            <div class="form-floating">
                <textarea class="form-control" name="description" placeholder="Leave a description here"
                    id="floatingTextarea2" style="height: 100px">
                   <?php echo $produit['description']; ?>
                    </textarea>
                <label for="floatingTextarea2">Description</label>
            </div><br>
            <div class="d-grid gap-2">
                <button class="btn btn-success" name='ajouterPanier' type="submit">Ajouter Panier</button>
            </div>
        </form>
    </section>
</main>