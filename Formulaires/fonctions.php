
<?php

function nomLengthIsValid($nomToValid)
{
    $length = strlen($nomToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Nom correct'
    ];
    if ($length < 2){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Nom trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Nom trop long'
        ];
    }
    return $responses;
}

function prenomLengthIsValid($prenomToValid)
{
    $length = strlen($prenomToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Prenom correct'
    ];
    if ($length < 2){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Prenom trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Prenom trop long'
        ];
    }
    return $responses;
};

function motLengthIsValid($motToValid)
{
    $length = strlen($motToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Mot de Passe correct'
    ];
    if ($length < 6){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Mot de Passe trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Mot de Passe trop long'
        ];
    }
    return $responses;
}
function addSalt($nameToSalt){
  $salt ='anita123';
  $saltedName =$salt.$nameToSalt.$salt;
  return $saltedName;
};

function encodeName($saltedName){
  $encodeName = sha1($saltedName);
  return $encodeName;
}
?>
    
    <?php
    //connection a la base de données
    $server = 'localhost';
    $username ="root";
    $pwd = "";
    $db = "ecom1_project";
    $conn = mysqli_connect($server,$username,$pwd,$db);
    
    if ($conn){
        //echo "<label>Connected to the $db database successfully</label>";
    }else{
        echo "<label>Error: Not connected to the $db database</label>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        ?>
        <ul>
            <?php
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $utilisateur = $_POST["userid"];
                $motdepasse = $_POST["motdepasse"];
                $confirmation =$_POST["cmotdepasse"];
                $email = $_POST["email"];
                $adresse = $_POST["adresse"];
                $token=rand(100,1000);


                

                // Insertion de données dans la base de donnéen
                $query = "INSERT INTO user VALUES (NULL,'$utilisateur','$email','$motdepasse','$nom','$prenom','$adresse','$adresse','$token',3)";
                
                if ($conn->query($query) === TRUE) {
                    echo "<li></strong>Données enregistrées avec succès.</strong></li>";
                } else {
                    echo "Erreur lors de l'enregistrement" . $conn->error;
                }
            
        
            ?>
        </ul>
        <?php
        // fermer la conncetion
        $conn->close();
    } else {
        header("Location: index.php");
        exit();
    }
    ?>
</body>
</html>