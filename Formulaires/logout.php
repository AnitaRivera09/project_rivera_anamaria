<?php
session_start();
session_destroy();
header("Location: ../Formulaires/home.php");
?>