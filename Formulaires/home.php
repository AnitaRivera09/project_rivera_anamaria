<?php

include "../Formulaires/header.php";

?>
<main>

  <?php $produits = getProduit() ?>
  <?php foreach ($produits as $key => $produit) { ?>
    <div class="card">
      <div class="image">
        <a href=<?php echo "../Formulaires/produit.php?id=" . $produit['id']; ?>>
          <?php $imag = getimage($produit['id']) ?>
          <img src=<?php echo $imag; ?>></a>
      </div>
      <div class="caption">
        <p class="rate">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </p>

        <p class="name">
          <?php echo $produit['name']; ?>
        </p>
        <p class="price">$
            <?php echo $produit['price']; ?>
          </b></p>

      </div>
      <a href="ajouterPanier.php?id=<?php echo $produit['id']; ?>"><button class="boton">Ajouter au panier</button>
    </div>
  <?php } ?>
</main>
</body>