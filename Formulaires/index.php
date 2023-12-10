<?php

session_start();

//coneccion BD

$dbhost ="localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ecom1_project";


$conn = mysqli_connect($dbhost, $dbuser,$dbpassword,$dbname);
if(!$conn){
    die("Echec de la connexion a la base de donne".mysqli_connect_error());
  }
  else{
    
  }
// permet de vérifier si le nom d'utilisateur et le mot de passe sont les mêmes que celui de la base de données
//isset vérifie si la variable est déclarée et non nulle
if(isset($_POST['send'])){
    $utilisateur=$_POST['utilisateur'];
    $motdepasse=$_POST['motdepasse'];
    $utilisateur=mysqli_real_escape_string($conn,$utilisateur);
    $motdepasse=mysqli_real_escape_string($conn,$motdepasse);
    echo 1;
if(!empty($utilisateur)&& !empty($motdepasse)){

  
     
    
    $sql= 'SELECT role_id FROM user where utilisateur = ? ';
    
    
    $result= $conn->prepare($sql);
    $result->bind_param("s",$utilisateur);
    $result->execute();
    $result = $result->get_result();


    if($result->num_rows >= 1)
    {
      $utilisateur =$result->fetch_assoc();
      if (password_verify($motdepasse,$utilisateur['pwd'])) {
      
      
                
                
                    unset($utilisateur['pwd']);
                 
                    $_SESSION["utilisateur"]=$utilisateur;
                    
                    header ('Location: ../Formulaires/home.php');

                 
              
              }
                
			
    }else{
      echo "L'utilisateur avec $utilisateur n'existe pas ";

    }

 
  }
}



?>
<!DOCTYPE html>
<html lang="en">
<body>
<form method= "post"> 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Utilisateur</label>
    <input type="text" class="form-control" id="utilisateur" aria-describedby="emailHelp" name = "utilisateur">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de Passe</label>
    <input type="password" class="form-control" id="motdepasse" name=motdepasse>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name = "send">Submit</button>


  <li><a href="../Formulaires/inscription.php">Inscription</a></li>

</form>
</body>

</html>