<?php

include "../Formulaires/header.php";
$produits = getProduit();
?>

<main>
    <section>
        <h1>Gestion produits</h1>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom produit</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Quantite</th>
                    <th scope="col" class="bg-transparent">Action</th>
                </tr>
            </thead>
            <tbody>


                <?php foreach ($produits as $produit) { ?>

                    <tr>
                        
                        <th scope="row">
                            <?php echo $produit['id']; ?>
                        </th>
                        <td>
                            <?php echo $produit['name']; ?>
                        </td>
                        <td>
                            <?php echo $produit['description']; ?>
                        </td>
                        <td>
                            <?php echo $produit['price']; ?>
                        </td>
                        <td>
                            <?php echo $produit['quantity']; ?>
                        </td>
                        <td class="row bg-transparent">
                            <div class="col-4">
                                <a href="modifierProduit.php?id=<?php echo $produit['id']; ?>"
                                    class="btn btn-block btn-success"><i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4 ">
                                <!--crea el hipervinculo para dirigir a la otra pagina al momento de dsar clic sobre el boton eliminar-, va hasta el otro archivo---->
                                <a href="efacerProduit.php?id=<?php echo $produit['id']; ?>"
                                    class="btn btn-block btn-danger"><i class="bi bi-trash"></i>
                                </a>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-4 ">
                                <a href="viewPanier.php?id=<?php echo $produit['id']; ?>"><button
                                        class="btn btn-success" name='ajouterPanier' type="submit">Ajouter Panier</button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>

        </table>



    </section>
</main>