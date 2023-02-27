<?php

$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");

$id = $_GET["id"];

$query = $db->query("SELECT * from matelas WHERE id = $id");
$matela = $query->fetch(PDO::FETCH_ASSOC);

include("templates/header.php");

?>

    <h1>Details</h1>
    <?php
    if ($matela) {
    ?>
        <div class="details-container">
            <div class="left-side">
                <img src="<?= $matela["image"] ?>" alt="">
            </div>
            <div class="right-side">
                <h3><?= $matela["fabricant"] ?></h3>
                <p><?= $matela["modele"] ?></p>
                <p><?= $matela["prix"] ?>€</p>
                <p name="" id="" cols="30" rows="10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima rerum inventore quia est, tempore quisquam exercitationem fugiat suscipit aspernatur consequuntur, reprehenderit voluptas maxime dolores a ut. Delectus odio excepturi quis!</p>
                <a class="input" href="edit.php?id=<?= $matela["id"] ?>">Modifier</a>
                <a class="submit" href="delete.php?id=<?= $matela["id"] ?>">Supprimer</a>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>