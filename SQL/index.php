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

//EXERCICE 1
//Créer un formulaire permettant d'ajouter un client dans la base de données.
//Il devra comporter les champs : nom, prénom, date de naissance, carte de fidélité (case à cocher) et numéro de carte de fidélité.
//A l'aide de ce formulaire, ajouter à la liste des clients Alicia Moore née le 8 septembre 1979 et ne possédant pas de carte de fidélité.




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices</title>
</head>
<body>
    <h2>Ex</h2>
    <form id="contact" method="post" action="index.php" enctype="multipart/form-data" onsubmit="return VerificationFormulaire(this)" >


    Nom: <input type="text" name="lastName" id="lastName"><br />
    Prénom: <input type="text" name="firstName" id="firstName"/><br />
    Date de naissance: <input type="date" name="birthDate" id="birthDate"/><br />
    Carte de fidélité: <input type="checkbox" name="card" id="card"/><label for="case"></label><br />
    Numéro de carte de fidélité: <input type="text" name="cardNumber" id="cardNumber"/><br />
    Type de carte: <input type="text" name="cardTypesId" id="cardTypesId" /><br />
    <br />
    <input type="submit" name="valider" value="Envoyer"/>
    </form>



        <?php
        if ( empty($_POST['lastName']) && empty($_POST['firstName']) && empty($_POST['birthDate']) && empty($_POST['card']) && empty($_POST['cardNumber']))

        {
		  echo "ERREUR : tous les champs n'ont pas ete renseignés.";
	     }

         else
         //On récupère les valeurs entrées par l'utilisateur :
	           {

                    $lastName=htmlspecialchars($_POST['lastName']);
                    $firstName=htmlspecialchars($_POST['firstName']);
                    $birthDate=htmlspecialchars($_POST['birthDate']);
                    $card=isset($_POST['card']);
                    $cardNumber=htmlspecialchars($_POST['cardNumber']);


                    $req = $database->prepare('INSERT INTO clients(lastName, firstName, birthDate, card, cardNumber) VALUES(:lastName, :firstName, :birthDate, :card, :cardNumber)');
                    $req->bindParam(':lastName', $lastName, PDO::PARAM_STR);
                    $req->bindParam(':firstName', $firstName, PDO::PARAM_STR);
                    $req->bindParam(':birthDate', $birthDate, PDO::PARAM_INT);
                    $req->bindParam(':card', $card);
                    $req->bindParam(':cardNumber', $cardNumber, PDO::PARAM_INT);

                    //METHODE 1

                    // $req->execute(array(
                    // 'lastName' => $lastName,
                    // 'firstName' => $firstName,
                    // 'birthDate' => $birthDate,
                    // 'card' => $card,
                    // 'cardNumber' => $cardNumber
                    // ));

                    $req->execute();
                }
                ?>

</body>
</html>


<!--Exercice 2: -->
