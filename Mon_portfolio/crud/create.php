<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http_equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/create.css" rel="stylesheet" type="text/css">
    <title>Brief</title>
</head>
<body>

<div class="title_form">

<div class="retour_title">
<h1>Nouveau brief : </h1>
<a class="retour" href="index.php">Retour</a>
</div>

<div class="form_container">
<form method="POST" action="data.php">

    <div class='section_form'>
        <div class='nom_section'>
            <img src="../assets/img/icones/photo.png"> Photo du brief:
        </div>
    <input type="text" name="photo" required placeholder="Ex: ../assets/img/img.jpg"/>
    </div>

    <div class='section_form'>
        <div class='nom_section'>
            <img src="../assets/img/icones/fork.png"> Titre du brief :
        </div>
    <input type="text" name="title" required />
    </div>

    <div class='section_form'>
        <div class='nom_section'>
            <img src="../assets/img/icones/assiette.png"> Type de language :
        </div>
    <input type="text" name="type" required />
    </div>

    <div class='section_form'>
        <div class='nom_section'>
            <img src="../assets/img/icones/copy.png"> Description :
        </div>
    <textarea name="contenu" required></textarea>
    </div>
    <div class="button">
    <input type="submit" name="submit" value="Publier"/>
    </div>

</form>
</div>
</div>



</body>
</html>
