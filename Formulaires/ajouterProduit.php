<?php include  "header.php"; 

// recuperar la informacion introducidos en cada campo 
if(isset($_POST['ajouter'])){
    $nomProduit=$_POST['nomProduit'];
    $description=$_POST['description'];
    $prix=$_POST['prix'];
    $quantite=$_POST['quantite'];

    //verifica si direccion valor o cantidad estan vacias
    if(empty($nomProduit)||empty($description)||empty($prix)||empty($quantite)){
        echo "Les champs sont vites";

    }else{

  
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
            $image_name = $_FILES["image"]["name"];
            $image_tmp = $_FILES["image"]["tmp_name"];

           
            $image_destination = "../Images/Produits" . basename($image_name); // Chemin de destination du fichier sur le serveur
            
           
            // Vérifier que le fichier est une image (facultatif mais recommandé)
            $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));
            if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                exit();
            }
        
            // Déplacer l'image téléchargée vers le dossier spécifié
            if (move_uploaded_file($image_tmp, $image_destination)){
          
               
                 ajouterProduit($nomProduit,$description,$prix,$quantite,$image_destination);
            }

    } 
    else{
        $image_destination = "";

         ajouterProduit($nomProduit,$description,$prix,$quantite,$image_destination);


    }
}


}

?>



<main>
    <section>
        <h1>Ajouter Produit</h1>

        <form  method="post"  enctype="multipart/form-data">
       

                <div class="mb-3">
                    <label for="nomproduit" class="form-label">Nom Produit</label>
                    <input type="text" name="nomProduit" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Desciption</label>
                    <input type="text" name="description" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" name="prix" class="form-control" >
                </div>

                <div class="mb-3">
                    <label for="quantite" class="form-label">Quantite</label>
                    <input type="number" name="quantite" class="form-control" >
                </div>

                </div>

                 <div class="mb-3" >
                 <label for="image">Choisize une image :</label>
                 <input type="file" name="image" id="image">
                    
                </div>
              


                 <div class="d-grid gap-2">
                <button class="btn btn-primary"name='ajouter' type="submit">Enregistrer</button>
                
                </div>
              
            
            </div>
        </Form>    


    </section>
</main>