<?php
include "../Formulaires/header.php"; 


if(isset($_GET['id'])){
   $id=$_GET['id'];
  $user=getUserById($id);
    
}

if(isset($_POST['Modifier'])){

    $user_name=$_POST['user_name'];    
    $nom= $_POST['nom'];    
    $email=$_POST['email'];    
    $prenom=$_POST['prenom'];    
    $rol=$_POST['rol'];   
    
    updateUser($id,$user_name,$email, $prenom, $nom, $rol); 

}
?>

<main>
    <section>
        <h1>Modifier l'utilisateur</h1>

        <form  method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" required name="user_name" class="form-control" value = <?php echo $user['user_name']; ?> >
                </div>

            <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" required name="nom" class="form-control" value = <?php echo $user['lname']; ?> >
                </div>

            <div class="mb-3">
                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" required name="prenom" class="form-control" value = <?php echo $user['fname']; ?> >
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" required name="email" class="form-control" value = <?php echo $user['email']; ?> >
                </div>               
                
                <label for="rol">Rol Utilisateur:</label>
                <select required name="rol" id="rol">
                    
                    <option value="2">2. Admin</option>
                    <option value="3">3. Client</option>
                    
                </select>


                 <div class="d-grid gap-2">
                <button class="boton"name='Modifier' type="submit">Modifier</button>
                
                </div>
              
            
            </div>
        </Form>