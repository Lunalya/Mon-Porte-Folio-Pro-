<?php

error_reporting(-1);
ini_set('display_errors', 'On');

define('DB_HOST', 'localhost:3306');
define('DB_NAME', 'projets');
define('DB_TABLE', 'brief');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Canelle1995');

try
{
    $bdd = new PDO ('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=3306' . ';dbtable=' . DB_TABLE . ';charset=utf8', DB_USER, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
    catch(PDOException $e)
{
    die('Erreur : '.$e->getMessage());
}
