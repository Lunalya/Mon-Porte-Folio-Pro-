<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>
        <?php
            $servername = 'localhost';
            $dbname= 'projets';
            $username = 'root';
            $password = 'Canelle1995';

            try{
                $dbco = new PDO("mysql:host=$servername", $username, $password);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "CREATE DATABASE projets";
                $dbco->exec($sql);

                echo 'Base de données créée bien créée !';
            }

            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }

            try{
                            $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $table_brief = "CREATE TABLE IF NOT EXISTS brief(
                                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                    photo VARCHAR(255) NOT NULL,
                                    nom_brief VARCHAR(30) NOT NULL,
                                    type_language varchar(30) NOT NULL,
                                    descrip longtext NOT NULL)";

                            $dbco->exec($table_brief);

                            echo 'Table bien créée !';
                        }

                        catch(PDOException $e){
                          echo "Erreur : " . $e->getMessage();
                        }



?>
    </body>
</html>
