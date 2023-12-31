<?php
include('../Functions/fonctions.php');

if (session_status() == PHP_SESSION_NONE) {
  // Solo inicia la sesión si no está activa
  session_start();
}

// Conección a la BD
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ecom1_project";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$conn) {
    die("Echec de la connexion a la base de donne" . mysqli_connect_error());
}

// Verifica si se ha enviado el formulario
if (isset($_POST['send'])) {
    $utilisateur = $_POST['utilisateur'];
    $motdepasse = $_POST['motdepasse'];
    
    $utilisateur = mysqli_real_escape_string($conn, $utilisateur);

    if (!empty($utilisateur) && !empty($motdepasse)) {
        // Corrige la consulta SQL
        $sql = 'SELECT * FROM user WHERE user_name = ?';
        
        $result = mysqli_prepare($conn, $sql);

        // Verifica si la preparación de la consulta fue exitosa
        if (!$result) {
            die("Error en la preparación de la consulta: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($result,"s", $utilisateur);
        mysqli_stmt_execute($result);
        
        // Obtiene el resultado de la consulta
        $result = mysqli_stmt_get_result($result);

        if (mysqli_num_rows($result) >= 1) {
            $utilisateur = mysqli_fetch_assoc($result);
            
            // Verifica la contraseña utilizando password_verify
            if (password_verify($motdepasse, $utilisateur['pwd'])) {
                unset($utilisateur['pwd']); // Elimina la contraseña antes de almacenar en sesión
                $_SESSION["utilisateur"] = $utilisateur;
                header('Location: ../Formulaires/home.php');
                exit;
            } else {
                echo "Mot de passe incorrect, merci de valider";
            }
        } else {
            echo "L'utilisateur $utilisateur n'existe pas!";
        }
    }
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
        <a class="a" href="../Formulaires/panier.php">
          <?php echo countElementPanier(); ?><img src="https://images.vexels.com/media/users/3/200060/isolated/preview/e39eb7217c7b5157d2c9154564d76598-icono-de-carrito-de-compras-rosa.png" alt="Carrito de compras" class="cart-icon">
        </a> 
      </nav>
    </div>
    <main>
    <table>
       <tr>
        <td rowspan="2">
           <img src="https://static.vecteezy.com/system/resources/previews/002/068/019/non_2x/girls-friendship-cartoon-design-vector.jpg" width="500" height="500">
        </td>
        <td colspan="2">
          <h1>Connexion</h1>
        </td> 
       </tr>
     <tr>
      <td>
      <form method="post" action="">
      <fieldset> 
            <table>            
             <tr>
               <td>Utilisateur</td>
               <td><input type="text" name="utilisateur" class="form-control" id="utilisateur" ></td>
             </tr>
             <tr>
               <td>Mot de Passe</td>
               <td><input type="password" name="motdepasse" class="form-control" id="motdepasse" ></td>
             </tr>
               <td><input type="submit" name="send" class="boton" value="Connexion"></td>                           
             </tr><br>
             </table>
             <span class="psw"><a href="../Formulaires/recuperationPassword.php">Oublie mot de passe?</a></span></br>
             <label id="1"><input type="checkbox" checked="checked" name="remember">Remember me</label></br>
             <span class="psw"><a href="../Formulaires/inscription.php">Cree un compte?</a></span></br>
        </fieldset>
       </form>
        </td>
      </tr>
   </table>
</footer>
</body>
</html>