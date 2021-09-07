<?php
session_start();

error_reporting(-1);
ini_set('display_errors', 'On');

require('db.php');

// Ma requete SELECT
$req = $bdd->prepare('SELECT * FROM brief');
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/index.css">
    <title>Indus - Admin</title>
</head>

<body>
    <main class="container">

            <section>
                <h1>Les briefs enregistrés: </h1>
                <?php
                    if(!empty($_SESSION['erreur'])){
                ?>
                    <div class="alert alert-danger" role="alert"> <?= $_SESSION['erreur'] ?></div>
                    <?= $_SESSION['erreur'] = "" ?>
                <?php
                    }
                ?>
                <?php
                    if(!empty($_SESSION['message'])){
                ?>
                    <div class="alert alert-sucess" role="alert"> <?= $_SESSION['message'] ?></div>
                    <?= $_SESSION['message'] = "" ?>
                <?php
                    }
                ?>
                        <?php
                            foreach ($result as $pseudo) {

                        ?>
                    <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title"> <?= $pseudo['id'] ?> - <?=  $pseudo["nom_brief"] ?> </h3>
                                    <div class="card-text">
                                        <?=  $pseudo["type_language"] ?>
                                    </div>
                                    <p class="card-text"> <?=  $pseudo["descrip"] ?> </p>
                                    <p> <strong>Chemin de la photo:</strong> <?= $pseudo['photo'] ?></p>
                                    <a href="read.php?id=<?= $pseudo['id'] ?>" class="btn btn-info">Voir</a>
                                    <a href="update.php?id=<?= $pseudo['id'] ?>" class="btn btn-warning">Modifier</a>
                                    <a href="delete.php?id=<?= $pseudo['id'] ?>" class="btn btn-danger">Supprimer</a>
                                    </div>
                                </div>
                    </div>


                        <?php
                            }
                        ?>
                        <div class="mybtn">
                            <a href="create.php" class="btn btn-primary">Nouvelle recette</a>
                            <div class="svg-wrapper">
                                <svg height="40" width="150" xmlns="http://www.w3.org/2000/svg">
                                <rect id="shape" height="40" width="150" />
                                <div id="text">
                                <a href="../Index.php"><span class="spot"></span>Retour sur le site</a>
                                </div>
                                 </svg>
                            </div>
                        </div>

                    </section>

            </main>
        </body>
        </html>
