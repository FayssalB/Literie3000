<?php
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");

$query = $db->query("SELECT * from matelas");
$matelas = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($_POST);
include("templates/header.php");
?>

    <div class="container">
        <!-- <pre><?= var_dump($matelas) ?></pre>  -->
        <h1>Nos produits</h1>
        <?php
        if ($matelas) {
            foreach ($matelas as $matela) {
        ?>
                <div class="item-container">
                    <div class="item-img">
                        <img src="<?= $matela["image"] ?>" alt="">
                    </div>
                    <h3><?= $matela["fabricant"] ?></h3>
                    <p><?= $matela["modele"] ?></p>
                    <p><?= $matela["prix"] ?>€</p>
                   <a href="details.php?id=<?=$matela["id"]?>">Détails</a>
                   <a href="delete.php?id=<?=$matela["id"]?>">Delete</a>
                </div>
        <?php
            }
        }
        ?>

            <div class="ajout-container">
                <!-- Background color + logo -->
            </div>

    </div>
</body>

</html>