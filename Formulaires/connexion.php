<?php
include '../Formulaires/fonctions.php';

//connexion a la bd
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ecom1_project";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conn) {
    die("Echec de la connexion a la base de donne" . mysqli_connect_error());
}
//permet de vérifier si le nom d'utilisateur et le mot de passe sont les mêmes que ceux de la base de données
//isset vérifier si la variable est déclarée et qu'elle n'est pas nulle
if (isset($_POST['send'])) {
    $utilisateur = $_POST['utilisateur'];
    $motdepasse = $_POST['motdepasse'];
    $utilisateur = mysqli_real_escape_string($conn, $utilisateur);
    $motdepasse = mysqli_real_escape_string($conn, $motdepasse);

    if (!empty($utilisateur) && !empty($motdepasse)) {


        $sql = 'SELECT * FROM user where user_name = "' . $utilisateur . '" and pwd="' . $motdepasse . '"';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            echo "L'utilisateur $utilisateur existe ";
            header('Location: ../Formulaires/home.php');
        } else {
            echo "L'utilisateur $utilisateur n'existe pas! Le nom d'utilisateur ou le mot de passe n'est pas correct! ";

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
     <td>
     <section>
        <h1>Connexion</h1>
        <form method="post">
           <div class="container">              
                <div class="mb-3">
                  <table>
                    <tr>
                        <td>Utilisateur</td>
                        <td><input type="text" name="utilisateur" class="form-control" id="utilisateur" ></td>
                    </tr>
                    <tr>
                       <td>Mot de Passe</td>
                       <td><input type="password" name="motdepasse" class="form-control" id="motdepasse" ></td>
                    </tr>
                    <br>
                  </table>
             <input type="submit" name="send" class="boton" value="Connexion">
             </div>
           </div>

            </div>
            <div class="control">
                <span class="psw"><a href="../Mot de passe oublie/index.html">oublie mot de passe?</a></span>
            </div>
            <div class="check">
                <label id="1"><input type="checkbox" checked="checked" name="remember">Remember me</label>
            </div>
            <div class="container">
                <div>
                </div>
                <span class="psw"><a href="../Formulaires/inscription.php">Cree un compte?</a></span>
            </div>
        </form>
    </div>

    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
</td>
</tr>
<tr>
  <td>
  <img src="https://media.istockphoto.com/id/1359786865/es/foto/concepto-de-seguridad-de-autenticaci%C3%B3n-de-contrase%C3%B1a-y-bloqueo-de-mujer-3d.jpg?s=1024x1024&w=is&k=20&c=hCDKEP_59MCighyk6wKtWghPA9LW_T9pT8BFM8EJKbM=">
  </td>
</tr>
    </table>
    </footer>
</body>

</html>