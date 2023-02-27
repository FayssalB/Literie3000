<?php

$id = $_GET["id"];

$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");

$query = $db->query("DELETE FROM matelas WHERE id=$id ");


echo "PRODUITS" .$id. "SUPPRIMER";
header("Location: index.php");
?>