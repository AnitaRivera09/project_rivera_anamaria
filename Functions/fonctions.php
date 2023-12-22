<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
function connexionDB()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "";
    $dbname = "ecom1_project";

    $connexion = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
    if (!$connexion) {
        die("Echec de la connexion a la base de donnee" . mysqli_connect_error());
    }
    return $connexion;
}

function inscription($nom, $prenom, $utilisateur, $email, $adresse, $motdepasse, $token)
{

    $conn = connexionDB();

    // Evitar les attaques par injection sql
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $utilisateur = mysqli_real_escape_string($conn, $utilisateur);
    $email = mysqli_real_escape_string($conn, $email);
    $adresse = mysqli_real_escape_string($conn, $adresse);
    $motdepasse = mysqli_real_escape_string($conn, $motdepasse);
    $motdepasseencript = password_hash($motdepasse, PASSWORD_BCRYPT);
    $token = hash('sha256', random_bytes(32));

    

    // Verificación email déjà existe en BD
    if (!empty($email)) {
        $sql = 'SELECT * FROM user where email = "' . $email . '"';
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            echo "L'utilisateur avec $email existe ";
        } else {
            $sql = "INSERT INTO user VALUES (NULL,'$utilisateur','$email','$motdepasseencript','$nom','$prenom','$adresse','$adresse','$token',3)";

            if (mysqli_query($conn, $sql)=== TRUE){
                echo "<li></strong>Félicitations! Vos données ont été enregistrées avec succès!</strong></li>";
                header('Location: ../Formulaires/connexion.php');
            } else {
                echo "Erreur lors de l'enregistrement: " . mysqli_error($conn);
            }
        }
    }

    // Fermer la connexion
    mysqli_close($conn);
}

function getProduit()
{
    $conn = connexionDB();
    $sql = "SELECT * FROM product";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $resultats = mysqli_stmt_get_result($stmt);
    $produits = array();
    foreach ($resultats as $produit) {
        $produits[] = $produit;

    }
    return $produits;

}
function getimage($id)
{
    $conn = connexionDB();
    $sql = 'SELECT * FROM product WHERE id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultat = mysqli_stmt_get_result($stmt);
    $image = mysqli_fetch_assoc($resultat);
    $ruta = $image["img_url"];
    return $ruta;

}



function updateProduit($nomProduit,$description,$prix,$quantity,$idproduit,$image_destination)
{
    $conn = connexionDB();


    $sql = 'UPDATE product set name=?, description=?, price =?, quantity=? where id = ? ';
    $stm = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stm,"ssdii", $nomProduit, $description, $prix, $quantity, $idproduit);
    $resultado=mysqli_stmt_execute($stm);
    mysqli_stmt_close($stm);
    mysqli_close($conn);
    header('Location: ../Formulaires/gestionProduits.php');


    if ($resultado == "1") {
        if ($image_destination != "") {

            updateImage($image_destination, $idproduit);

        }
        header('Location: ../Formulaires/gestionProduits.php');

    } else {
        echo 'Erreur';
    }


}

function updateImage($chemin, $idproduit)
{
    $conn = connexionDB();
    $sql = 'UPDATE product SET img_url=? where  id=?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $chemin, $idproduit);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    if ($resultat) {
        var_dump($resultat);
        header("Location:../Formulaire/gestionProduits.php");
    } else {
        echo "une erreur c'est produit";
    }

}
function getProduitById($id)
{
    $conn = connexionDB();
    $sql = 'SELECT * FROM product WHERE id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,"i", $id);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    $produit = mysqli_fetch_assoc($resultat);
    return $produit;
}

function getAdresseById($id)
{

    $conn = connexionDB();

    $sql = 'SELECT * from address where id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,'i', $id);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    $adresse = mysqli_fetch_assoc($resultat);
    return $adresse;
}

function effacerProduit($id)
{
    $conn = connexionDB();
    $sql = 'DELETE FROM product WHERE id=?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,'i', $id);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if ($resultado) {
        //header permet de rediriger le fichier // là où vous devez l'envoyer
        header('Location: ../Formulaires/gestionProduit.php');

    } else {
        echo 'Erreur';
    }

}

function ajouterAdresse($streetName,$streetNb,$city,$province,$zipCode,$country){

    $conn = connexionDB();

    //création de requête
    $sql = "INSERT INTO address (id, street_name, street_nb, city, province, zip_code, country) VALUES (NULL,'$streetName','$streetNb','$city','$province','$zipCode','$country')";

    $stm = mysqli_prepare($conn, $sql);
    $resultado = mysqli_stmt_execute($stm); //return un boolean
    $idproduits = mysqli_insert_id($conn);
    mysqli_stmt_close($stm);
    mysqli_close($conn);
    
    echo("Adresse ajouté avec succès!");
    header('Location: ../Formulaires/home.php');
}

function ajouterProduit($nameproduct, $description, $price, $quantity, $urlimage)
{
    $conn = connexionDB();
    $sql = "INSERT INTO product (id, name, quantity, price, img_url, description) VALUES (NULL,?,?,?,?,?)";

    $stm = mysqli_prepare($conn, $sql);
    if (!$stm) {
        die('Erreur: ' . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stm, "ssdss", $nameproduct, $quantity, $price, $urlimage, $description);
    $resultado = mysqli_stmt_execute($stm);

    if ($resultado) {
        $idproduits = mysqli_insert_id($conn);
        echo "Produit ajouté avec succès!";
        header('Location: ../Formulaires/gestionProduits.php');
    } else {
        die('Error al ejecutar la consulta: ' . mysqli_error($conn));
    }

    mysqli_stmt_close($stm);
    mysqli_close($conn);
}

function getUsers()
{

    $conn = connexionDB();


    $sql = 'SELECT r.name as name, u.role_id as role_id ,u.user_name as user_name, u.lname as nom, u.fname as prenom, u.email as email, u.id as id_user FROM user u 
 inner join role r on u.role_id = r.id';


    $stm = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stm);
    $resultados = mysqli_stmt_get_result($stm); // obtient tous les résultats obtenus de l'exécution
    $users = array();
    
    foreach ($resultados as $user) {
        $users[] = $user;
    }
    return $users;


}

function getUserById($id)
{
    $conn = connexionDB();
    $sql = 'SELECT * FROM user WHERE id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,"i", $id);
    mysqli_stmt_execute($stmt);

    $resultat = mysqli_stmt_get_result($stmt);
    //
    $user = mysqli_fetch_assoc($resultat);
    return $user;

}

function getUserByUsername(string $user_name)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $user_name = mysqli_fetch_assoc($result);
    return $user_name;
}

function updateUser($id,$user_name,$email, $prenom, $nom, $rol)
{
    $conn = connexionDB();
    $query = "UPDATE user SET user_name=?, email=?, fname=?, lname=?, role_id=? where id=?";
    if ($stmt = mysqli_prepare($conn, $query)){
     mysqli_stmt_bind_param($stmt,"ssssii", $user_name, $email, $prenom, $nom, $rol,$id); 
     $result=mysqli_stmt_execute($stmt);
         
    header('Location: ../Formulaires/gestionUsers.php');

    if ($result== "1") {
       
        header('Location: ../Formulaires/gestionUsers.php');

    } else {
        echo 'Erreur';
    }
}
}

function effacerUser($id)
{

    $conn = connexionDB();
    $sql = 'DELETE FROM user WHERE id=?';
    $stm = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stm,'i', $id);
    $resultado = mysqli_stmt_execute($stm);
    mysqli_stmt_close($stm);
    mysqli_close($conn);

    if ($resultado) {
        header('Location: ../Formulaires/gestionUsers.php');

    } else {
        echo 'Erreur';
    }

}


function supprimerProduit($id)
{
    $conn = connexionDB();
    $sql = 'DELETE from product  where id = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,'i', $id);
    $resultat = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if ($resultat) {
        header('Location: ../Formulaires/gestionProduits.php');
    } else {
        echo 'Erreur';
    }
}
function addCard($id, $quantiteDemander)
{
    $_SESSION['panier'][$id] = $quantiteDemander;

    header('Location: ../Formulaires/panier.php');
}
function countElementPanier()
{
    $taillePanier = count($_SESSION['panier']);
    return $taillePanier;

}

function getAllPanier()
{
    return $_SESSION['panier'];
}


function viderPanier($id)
{
    unset($_SESSION['panier'][$id]);

}