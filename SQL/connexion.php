<?php

$bdd= "exercice";
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $database = new PDO("mysql:host=$servername;dbname=$bdd;charset=utf8", $username, $password);
    //set the PDO error mode to exception
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    echo "Connected successfully<br><br>";
    }

catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
