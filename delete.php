<?php

$id = $_GET["id"];

$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");

$query = $db->query("DELETE FROM matelas WHERE id=$id ");

header("Location: index.php");
?>