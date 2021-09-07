<?php
session_start();

error_reporting(-1);
ini_set('display_errors', 'On');

require('db.php');

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['photo']) && !empty($_POST['photo']) && isset($_POST['nom_brief']) && !empty($_POST['nom_brief']) && isset($_POST['descrip']) && !empty($_POST['descrip']) && isset($_POST['type_language']) && !empty($_POST['type_language'])){

        $id  = htmlspecialchars($_POST['id']);
        $photo = htmlspecialchars($_POST['photo']);
        $nom_brief   = htmlspecialchars($_POST['nom_brief']);
        $type_language = htmlspecialchars($_POST['type_language']);
        $descrip = htmlspecialchars($_POST['descrip']);

        $req = $bdd->prepare("UPDATE brief SET id = :id, photo = :photo, nom_brief = :nom_brief, type_language = :type_language, descrip = :descrip WHERE id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':nom_brief', $nom_brief, PDO::PARAM_STR);
        $req->bindValue(':type_language', $type_language, PDO::PARAM_STR);
        $req->bindValue(':photo', $photo, PDO::PARAM_STR);
        $req->bindValue(':descrip', $descrip, PDO::PARAM_STR);
        $req->execute();

        $_SESSION['message'] = "L'utilisateur a bien été modifié";
        header('location: index.php');

    }
    else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = htmlspecialchars($_GET['id']);

    $req = $bdd->prepare('SELECT * FROM brief WHERE id = :id');
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $result = $req->fetch();

    if(!$result){
        $_SESSION['erreur'] = "Cet ID n'existe pas";
        header('location: index.php');
    }

}
else {
    $_SESSION['erreur'] = "L'URL demandé n'existe pas";
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="../assets/css/update.css" rel="stylesheet" type="text/css">

    <title>Portfolio - Modification </title>
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-8">
                <h1>Modifier un brief</h1>
                <?php
                    if(!empty($_SESSION['erreur'])){
                ?>
                    <div class="alert alert-danger" role="alert"> <?= $_SESSION['erreur'] ?></div>
                    <?= $_SESSION['erreur'] = "" ?>
                <?php
                    }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="title">  <img src="../assets/img/icones/fork.png"> Nom : </label>
                        <input type="text" id="nom_plat" name="nom_plat" class="form-control" value=" <?= $result['nom_brief'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="chemin_photo">  <img src="../assets/img/icones/photo.png"> Chemin de la photo : </label>
                        <input type="text" id="photo" name="photo" class="form-control" value=" <?= $result['photo'] ?>">
                    </div>
                    <div class="form-group">
                    <label for="type_plat">  <img src="../assets/img/icones/assiette.png"> Type de language : </label>
                        <input type="text" id="type_language" name="type_language" class="form-control" value=" <?= $result['type_language'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descrip">  <img src="../assets/img/icones/copy.png"> Description : </label>
                        <textarea type="textarea" id="descrip" name="descrip" class="form-control" value="text"><?= $result['descrip'] ?></textarea
                    </div>
                    <input type="hidden" value=" <?= $result['id'] ?>" name="id">
                    <button class="btn btn-warning">Modifier</button>
                    <a href="index.php" class="btn btn-secondary">Retour à l'accueil</a>
                </form>
            </section>
        </div>
    </main>
</body>
</html>
