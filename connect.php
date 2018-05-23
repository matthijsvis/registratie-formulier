<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 23-02-18
 * Time: 10:01
 */


$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=localhost;dbname=registratieformulier", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    echo $error->getMessage();
}

/*htmlspecialch ars() zorgt ervoor dat alles word gezien als normale tekst*/
//wachtwoord van formulier vergelijken met wachtwoord van de gebruiker in de database

