<?php

include "../Functions/fonctions.php";


$tab = getAllPanier();
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

    <link rel="stylesheet" href="../CSS/header.css" />
    <title>Magazin . Riveranis</title>
</head>

<body>
    <main>
        <?php foreach ($tab as $id => $qte) {
            $produit = getProduitById($id); ?>

            <div class="card">
                <div class="images">
                    <a href=<?php echo $produit['id']; ?>>
                        <?php $imag = getimage($produit['id']) ?>
                        <img src=<?php echo $imag; ?>></a>
                </div>
                <div class="caption">

                    <p class="product_name">
                        <?php echo $produit['name']; ?>
                    </p>
                    <p class="price"><b>
                            <?php echo $produit['price']; ?>
                        </b></p>
                    <p class="description"><b>
                            <?php echo $produit['description']; ?>
                        </b></p>
                    <p class="quantity"><b> <input type="number" value="<?php echo $qte; ?>" min="0"
                                max="<?php echo $produit['quantity']; ?>">

                        </b></p>
                    <a href="supprimerProduit.php?id=<?php echo $produit['id']; ?>"><button
                            class="remove">Supprimer</button></a>

                    <a href="viewPanier.php?id=<?php echo $produit['id']; ?>"> <button
                            class="update">View</button></a>
                    <div id="paypal-payment-button"></div>

                </div>
            </div>
        <?php } ?>
    </main>
</body>