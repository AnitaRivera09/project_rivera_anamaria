<?php
include  "../Formulaires/header.php";

$prod = null;

if(isset($_GET['id'])){
    $idproduit=$_GET['id'];
   $prod=getProduitById($idproduit);
     
 }
 
 if(isset($_POST['Modifier'])){
     $nomProduit= $_POST['name'];
     $description=$_POST['description'];
     $prix=$_POST['price'];
     $quantite=$_POST['quantity'];
 
     if(empty($nomProduit)||empty($description)||empty($prix)||empty($quantite)){
         echo "Les champs sont vides!";
 
     }else{
 
 echo (isset($_FILES["image"]["error"]));
     
         if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
             $image_name = $_FILES["image"]["name"];
             $image_tmp = $_FILES["image"]["tmp_name"];
            
             $image_destination = "images/" . basename($image_name); // Chemin de destination du fichier sur le serveur
             echo $image_destination;
             // Vérifier que le fichier est une image (facultatif mais recommandé)
             $image_type = strtolower(pathinfo($image_destination, PATHINFO_EXTENSION));
             if (!in_array($image_type, array("jpg", "jpeg", "png", "gif"))) {
                 echo "Seules les images JPG, JPEG, PNG et GIF sont autorisées.";
                 exit();
             }
         
             // Déplacer l'image téléchargée vers le dossier spécifié
             if (move_uploaded_file($image_tmp, $image_destination)){
           
                 
                 updateProduit($nomProduit,$description,$prix,$quantite,$idproduit,$image_destination);
             }
 
     } 
     else{
         $image_destination = "";
          
          
          updateProduit($nomProduit,$description,$prix,$quantite,$idproduit,$image_destination);
 
     }
 } 
 }
 ?> 
 <main>
     <section>
         <h1>Modifier Produit</h1> 
         <form  method="post" enctype="multipart/form-data">        
 
             <div class="mb-3">
                     <label for="nomproduit" class="form-label">Nom Produit</label>
                     <input  size=250 name="name" class="form-control" value = <?php echo $prod['name']; ?> >
                 </div>
 
                 <div class="mb-3">
                     <label for="description" class="form-label">Description</label>
                     <input type="text" name="description" class="form-control" value = <?php echo $prod['description']; ?> >
                     
                 </div>
 
                 <div class="mb-3">
                     <label for="prix" class="form-label">Prix</label>
                     <input type="number" step="any" name="price" class="form-control" value = <?php echo $prod['price']; ?> >
                 </div>

                 <div class="mb-3">
                     <label for="quantite" class="form-label">Quantite</label>
                     <input type="number" name="quantity" class="form-control" value = <?php echo $prod['quantity']; ?> >
                 </div>
 
                 <div class="mb-3" >
                  <label for="image">Choisisez une imagen :</label>
                  <input type="file" name="image" id="image">
                  </div>          
 
 
                  <div class="d-grid gap-2">
                 <button class="boton"name='Modifier' type="submit">Modifier</button>
                 
                 </div>
               
             
             </div>
         </Form>                
                 
      </section>
 </main>
