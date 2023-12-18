<?php
include "../Formulaires/header.php"; 

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


if(isset($_GET['id'])){
   $id=$_GET['id'];
  $user=getUserById($id);
    
}

if(isset($_POST['Modifier'])){

    $user_name=$_POST['user_name'];    
    $nom= $_POST['nom'];    
    $email=$_POST['email'];    
    $prenom=$_POST['prenom'];    
    $adresse=$_POST['adresse'];   
    
    updateUser($id,$user_name,$email, $prenom, $nom, $adresse); 

}
?>

<main>
    <section>
        <h1>Modifier mes données</h1>

        <form  method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" required name="user_name" class="form-control" value = <?php echo $utilisateur['user_name']; ?> >
                </div>

            <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" required name="nom" class="form-control" value = <?php echo $utilisateur['lname']; ?> >
                </div>

            <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" required name="prenom" class="form-control" value = <?php echo $utilisateur['fname']; ?> >
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" required name="email" class="form-control" value = <?php echo $utilisateur['email']; ?> >
                </div>               
                
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="number" required name="adresse" class="form-control" value = <?php echo $utilisateur['billing_address_id']; ?> >
                </div> 


                 <div class="d-grid gap-2">
                <button class="boton"name='Modifier' type="submit">Modifier</button>
                
                </div>
              
            
            </div>
        </Form>