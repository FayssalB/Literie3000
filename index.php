<?php
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "");

$query = $db->query("SELECT * from matelas");
$matelas = $query->fetchAll(PDO::FETCH_ASSOC);

var_dump($_POST);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Literie</title>
</head>

<body>
    <header>
        <div>Literie3000</div>
        <div>
            <ul>
                <li><a href="">Nos produits</a></li>
            </ul>
        </div>
    </header>
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