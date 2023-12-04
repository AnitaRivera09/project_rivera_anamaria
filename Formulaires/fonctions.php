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
//////
function inscription($nom, $prenom, $utilisateur, $motdepasse, $email)
{
    $conn = connexionDB();

    // 1. eviter les attaques par injection sql
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $utilisateur = mysqli_real_escape_string($conn, $utilisateur);
    $motdepasse = mysqli_real_escape_string($conn, $motdepasse);
    $email = mysqli_real_escape_string($conn, $email);
    //encriptar password
    $motdepassehash = password_hash($motdepasse, PASSWORD_DEFAULT);




    //verification email deja  existe en BD
    if (isset($_POST['envoyer'])) {
        $email = $_POST['email'];
        $email = mysqli_real_escape_string($conn, $email);
        if (!empty($email)) {

            $sql = 'SELECT * FROM user where email = "' . $email . '"';
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                echo "L'utilisateur avec $email existe ";
            } else { // ??? informacion que ingresa usuario
                $sql = "INSERT INTO user(nom,nam,email,pass) values(?,?,?,?)";
                $stmt = $conn->prepare($sql); //prepara la requete
                $stmt->bind_param("ssss", $nom, $prenom, $email, $mot_de_passe_hash); // pasa parametros funcion bind_param(types(s=String),tab())
                $result = $stmt->execute(); //execute recturna un boolean
                //busca la informacion del usuario 
                $sql2 = 'SELECT * FROM person where email = "' . $email . '"';
                $result2 = mysqli_query($conn, $sql2);
                //obtiene el id
                $resultId = mysqli_fetch_assoc($result2);
                $id = $resultId["id"];
                //rol cliente
                $client = 2;


                $sql3 = "INSERT INTO personrole(id_role,id_person) values(?,?)";
                $stmt = $conn->prepare($sql3);
                $stmt->bind_param("is", $client, $id);
                $result1 = $stmt->execute();

                if ($result) {

                    // hace validacion
                    echo header('Location: ./index.php');
                } else {
                    echo "Une erreur est survenue";
                }
            }
        }
    }
}


function getProduit()
{
    $conn = connexionDB();
    $sql = "SELECT * FROM product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultats = $stmt->get_result();
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
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultat = $stmt->get_result();

    $image = $resultat->fetch_assoc();

    $ruta = $image["img_url"];
    return $ruta;

}



function updateProduit($idproduit, $nameproduct, $quantity, $price, $description, $urlimage)
{
    $conn = connexionDB();


    $sql = 'UPDATE product set name=?, description=?, price =?, quantity=? where id = ? ';
    $stm = $conn->prepare($sql);
    $stm->bind_param("ssdii", $nameproduct, $description, $price, $quantity, $idproduit);
    $resultado = $stm->execute();
    $stm->close();
    $conn->close();
    header('Location: ../Formulaires/gestionProduit.php');


    if ($resultado == "1") {
        if ($urlimage != "") {

            updateImage($urlimage, $idproduit);

        }
        header('Location: ../Formulaires/gestionProduit.php');

    } else {
        echo 'Erreur';
    }


}

function getProduitById($idproduit)
{

    $conn = connexionDB();

    $sql = 'SELECT * from product where id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $idproduit);
    $stmt->execute();
    $resultat = $stmt->get_result();
    $produit = $resultat->fetch_assoc();
    return $produit;
}

function effacerProduit($idproduit)
{
    $conn = connexionDB();
    $sql = 'DELETE FROM product WHERE id=?';
    $stm = $conn->prepare($sql);
    $stm->bind_param('i', $idproduit);
    $resultado = $stm->execute();
    $stm->close();
    $conn->close();

    if ($resultado) {
        //header permet de rediriger le fichier // là où vous devez l'envoyer
        header('Location: ../Formulaires/gestionProduit.php');

    } else {
        echo 'Erreur';
    }

}


function ajouterProduit($nameproduct, $description, $price, $quantity, $urlimage)
{
    $conn = connexionDB();

    //création de requête
    $sql = 'INSERT INTO product (id, name, quantity, price, img_url, description) VALUES (NULL,?,?,?,?)';

    $stm = $conn->prepare($sql);
    //para evitar inyeccion sql pide el tipo de los datos
    $stm->bind_param('isidss', NULL, $nameproduct, $quantity, $price, $urlimage, $description);
    $resultado = $stm->execute(); //return un boolean
    $idproduits = $conn->insert_id;
    $stm->close();
    $conn->close();



    var_dump($resultado);
    var_dump($urlimage);
    if ($resultado == "1") {

        if ($urlimage != "") {

            registrerImage($idproduits, $urlimage);
        }
        header('Location: ../Formulaires/gestionProduit.php');

    } else {
        echo 'Erreur';
    }


}

//function registrerImage($id_produit, $chemin)
//{
  //  $conn = connexionDB();
    //$sql = 'INSERT INTO image(id_produit, chemin) VALUES (?,?)';
    //$stmt = $conn->prepare($sql);
    //$stmt->bind_param("is", $id_produit, $chemin);
    //$stmt->execute();
    //$resultat = $stmt->get_result();
    //if ($resultat) {
      //  header("Location:./gestionProduit.php");
    //} else {
      //  echo "une erreur c'est produit";
    //}

//}

function getUsers()
{

    $conn = connexionDB();


    $sql = 'SELECT r.name as name, u.role_id as role_id ,u.user_name as user_name, u.lname as nom, u.fname as prenom, u.email as email, u.id as id_user FROM user u 
 inner join role r on u.role_id = r.id';


    $stm = $conn->prepare($sql);
    $stm->execute();
    $resultados = $stm->get_result(); // obtient tous les résultats obtenus de l'exécution
    //variable type table
    $users = array();
    
    foreach ($resultados as $user) {
        $users[] = $user;
    } //returna una tabla de usuarios
    return $users;


}

function getUserById($id)
{
    $conn = connexionDB();
    $sql = 'SELECT * FROM user WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultat = $stmt->get_result();
    //
    $user = $resultat->fetch_assoc();
    return $user;

}

function updateUser($username,$email, $motdepasse, $prenom, $nom, $rol)
{
    $conn = connexionDB();

    $sql = 'UPDATE user set user_name=?, email=?, pwd=?, fname=?, lname=?, role_id =? where id = ?';
    $stm = $conn->prepare($sql);
    $stm->bind_param("sssssi", $username, $email, $motdepasse, $prenom, $nom, $rol);
    $resultado = $stm->execute();

    $stm->close();
    $conn->close();

    if ($resultado) {
        //header permire rediriger el ficher// donde necesita enviarlo
        header('Location: ../Formulaires/gestionUsers.php');

    } else {
        echo 'Erreur';
    }

}


function effacerUser($id)
{

    $conn = connexionDB();
    $sql = 'DELETE FROM user WHERE id=?';
    $stm = $conn->prepare($sql);
    $stm->bind_param('i', $id);
    $resultado = $stm->execute();
    $stm->close();
    $conn->close();

    if ($resultado) {
        //header permire rediriger el ficher// donde necesita enviarlo
        header('Location: ../Formulaires/gestionUsers.php');

    } else {
        echo 'Erreur';
    }

}


function supprimerProduit($id)
{
    $conn = connexionDB();
    $sql = 'DELETE from product  where id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $resultat = $stmt->execute();
    $stmt->close();
    $conn->close();

    if ($resultat) {
        header('Location: ../Formulaires/gestionProduit.php');
    } else {
        echo 'Erreur';
    }
}
function addCard($id, $quantiteDemander)
{
    $_SESSION['panier'][$id] = $quantiteDemander;

    header('Location: ../Formulaires/produit.php');
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