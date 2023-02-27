<?php

if (!empty($_POST)) {

    $image = trim(strip_tags($_POST["image"]));
    $fabricant = trim(strip_tags($_POST["fabricant"]));
    $modele = trim(strip_tags($_POST["modele"]));
    $dimensions = trim(strip_tags($_POST["dimension"]));
    $prix = trim(strip_tags($_POST["prix"]));

    $errors = [];

    if (empty($image) || empty($fabricant) || empty($modele) || empty($dimensions) || empty($prix)) {
        $errors["emptyInput"] = "Tous les champs doivent être renseigné";
    }
    if (!filter_var($image, FILTER_VALIDATE_URL)) {
        $errors["url"] = "L'URL n'est pas valide";
    }

    if (empty($errors)) {
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "");

        $query = $db->prepare("INSERT INTO matelas(fabricant,modele,dimension,prix,image) VALUES (:fabricant,:modele, :dimension,:prix,:image)");
        $query->bindParam(":fabricant", $fabricant);
        $query->bindParam(":modele", $modele);
        $query->bindParam(":dimension", $dimensions);
        $query->bindParam(":prix", $prix, PDO::PARAM_INT);
        $query->bindParam(":image", $image);

        if ($query->execute()) {
            header("Location: index.php");
        }
    }
}

include("templates/header.php");
?>

<h1>Ajout d'un produit</h1>
<form action="" method="post">
    <div class="add-container">
        
        <div class="form-group">
            <label for="inputImage">URL de l'image</label>
            <input type="text" name="image" value="<?= isset($image) ? $image : "" ?>">
        </div>

        <div class="form-group">
            <label for="inputFabricant">Nom du fabricant</label>
            <input type="text" name="fabricant" value="<?= isset($fabricant) ? $fabricant : "" ?>">
        </div>

        <div class="form-group">
            <label for="inputmodele">Modele</label>
            <input type="text" name="modele" value="<?= isset($modele) ? $modele : "" ?>">
        </div>
        <div class="form-group">
            <label for="inputDimension">Dimension</label>
            <input type="text" name="dimension" value="<?= isset($dimensions) ? $dimensions : "" ?>">
        </div>
        <div class="form-group">
            <label for="inputPrix">Prix</label>
            <input type="number" name="prix" value="<?= isset($prix) ? $prix : "" ?>">
        </div>

        <input type="submit" value="Ajouter le produit" class="submit">
    </div>
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
        </div>
</form>
</body>

</html>