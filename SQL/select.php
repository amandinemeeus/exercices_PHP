
<?php

$bdd= "exercice";
$servername = "localhost";
$username = "root";
$password = "root";

try
{
$database = new PDO("mysql:host=$servername;dbname=$bdd;charset=utf8", $username, $password);
}
catch(Exception $e)
{die('Erreur : '.$e->getMessage());
}

// require 'connexion.php';

// EXERCICE 1
// $response = $database->query('SELECT * FROM clients');
// while ($donnees = $response->fetch())
// {
//     echo '<p>' . $donnees['lastName'] . '</p>';
// }

//EXERCICE 2
// $response = $database->query('SELECT * FROM genres');
// while ($donnees = $response->fetch())
// {
//     echo '<p>' . $donnees['genre'] . '</p>';
// }

//EXERCICE 3
// $response = $database->query('SELECT * FROM clients LIMIT 0, 20');
// while ($donnees = $response->fetch())
// {
//     echo '<p>' . $donnees['lastName'] . '</p>';
// }
// $response->closeCursor();

//EXERCICE 4
// $response = $database->query('SELECT * FROM clients WHERE card=\'1\'');
// while ($donnees = $response->fetch())
// {
//     echo '<p>' . $donnees['lastName'] . '</p>';
// }
// $response->closeCursor();

// EXERCICE 5
// $response = $database->query('SELECT lastName, firstName FROM clients WHERE lastName LIKE \'M%\' ORDER BY lastName  ');
//
// while ($donnees = $response->fetch())
// {
//      echo '<p>' . $donnees['lastName'] . '</p>';
// }
// $response->closeCursor();

 // faire attention à l'ordre des requêtes!

//EXERCICE 5 by ERIC

// $query = $database->prepare('SELECT * FROM clients WHERE lastName LIKE \'M%\' ORDER BY lastName');
// $query->execute();
// $ex = $query->fetchAll();

//EXERCICE 6

// $query = $database->prepare('SELECT * FROM shows ORDER BY title');
// $query->execute();
// $ex = $query->fetchAll();

//EXERCICE 7
$query = $database->prepare('SELECT * FROM clients ORDER BY lastName');
$query->execute();
$ex = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices</title>
</head>
<body>
    <h2>Ex</h2>
<?php
foreach ($ex as $value) {
    ?>


    <!-- EXERCICE 5
    <ul>
    <li> <?= 'Nom : ' . $value['lastName'] ?> </li>
    <li> <?= 'Prénom : ' . $value['firstName'] ?> </li>
    </ul> -->
    <!-- EXERCICE 6
    <ul>
        <li> <?= $value['title'] . ' par ' . $value['performer'] . ' le ' . $value['date'] . ' à ' . $value['startTime'] ?> </li>
    </ul> -->

    <!-- EXERCICE 7-->
    <ul>
    <li> <?= 'Nom : ' . $value['lastName'] ?> </li>
    <li> <?= 'Prénom : ' . $value['firstName'] ?> </li>
    <li> <?= 'Date de naissance : ' . $value['birthDate'] ?> </li>
    <li> <?= 'Carte de fidélité : ' . $value['card'] ?> </li>
    <li> <?= 'Numéro de carte : ' . $value['cardNumber'] ?> </li>
    </ul>

<?php
}
?>
</body>
</html>
