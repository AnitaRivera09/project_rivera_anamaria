<?php
include '../Formulaires/fonctions.php';
//recupera el id y lo pasa como parametro a la funcion de eliminar
if(isset($_GET['id'])){
    $id=$_GET['id'];
    effacerProduit($id);
}



?>