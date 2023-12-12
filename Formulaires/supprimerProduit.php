<?php
include '../Functions/fonctions.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    supprimerProduit($id);
}
?>