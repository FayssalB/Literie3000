<?php

$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");

$id = $_GET["id"];

$query = $db->query("SELECT * from matelas WHERE id = $id");
$matela = $query->fetch(PDO::FETCH_ASSOC);

$image = $matela["image"];
$fabricant = $matela["fabricant"];
$modele = $matela["modele"];
$dimension = $matela["dimension"];
$prix = $matela["prix"];

if (!empty($_POST)) {

    $new_image = trim(strip_tags($_POST["image"]));
    $new_fabricant = trim(strip_tags($_POST["fabricant"]));
    $new_modele = trim(strip_tags($_POST["modele"]));
    $new_dimension = trim(strip_tags($_POST["dimension"]));
    $new_prix = trim(strip_tags($_POST["prix"]));

    $errors = [];

    if (empty($image) || empty($fabricant) || empty($modele) || empty($dimension) || empty($prix)) {
        $errors["emptyInput"] = "Tous les champs doivent être renseigné";
    }
    if(!filter_var($image,FILTER_VALIDATE_URL)){
        $errors["url"] = "L'URL n'est pas valide";
    }

    if (empty($errors)) {
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "");

        $query = $db->prepare("UPDATE matelas SET fabricant = '$new_fabricant', image = '$new_image', modele = '$new_modele', prix='$new_prix', dimension ='$new_dimension' WHERE id = $id");

        if($query->execute()){
            header("Location: details.php?id=$id");
        }
    }
}
include("templates/header.php");
?>


    <h1>Modification d'un produit</h1>
    <div class="container">
     <form action="" method="post">
        <div>
            <?php
            if (!empty($errors)) {
            ?>
                <p><?= $errors["emptyInput"] ?></p>  
                <p><?= $errors["url"] ?></p>
                <!-- Tester au bon endroit -->
            <?php
            }
            ?>
            <label for="inputImage">URL de l'image</label>
            <input type="text" name="image" value="<?= isset($image) ? $image : "" ?>">

            <label for="inputFabricant">Nom du fabricant</label>
            <input type="text" name="fabricant" value="<?= isset($fabricant) ? $fabricant : "" ?>">

            <label for="inputmodele">Modele</label>
            <input type="text" name="modele" value="<?= isset($modele) ? $modele : "" ?>">

            <label for="inputDimension">Dimension</label>
            <input type="text" name="dimension" value="<?= isset($dimension) ? $dimension : "" ?>">

            <label for="inputPrix">Prix</label>
            <input type="number" name="prix" value="<?= isset($prix) ? $prix : "" ?>">

            <input type="submit" value="Modifier le produit">
        </div>
    </form>
    </div>
</body>
</html>