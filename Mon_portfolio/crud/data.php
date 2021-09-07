

<?php


if (isset($_POST["title"], $_POST["contenu"]) && !empty($_POST["title"]) && !empty($_POST["contenu"]))
{
    $title = htmlspecialchars($_POST["title"]);
    $photo = htmlspecialchars($_POST["photo"]);
    $type = htmlspecialchars($_POST["type"]);
    $contenu = htmlspecialchars($_POST["contenu"]);

    $db = new PDO('mysql:host=localhost;dbname=projets', 'root', 'Canelle1995');
    $sql = "INSERT INTO brief (photo, nom_brief, type_language, descrip) VALUES (:photo,  :title, :type, :contenu)";
    $request = $db->prepare($sql);
    $request->bindParam(':title', $title);
    $request->bindParam(':photo', $photo);
    $request->bindParam(':type', $type);
    $request->bindParam(':contenu', $contenu);
    $request->execute();

    Header("Location:index.php");

}

?>
