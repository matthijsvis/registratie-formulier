<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 21-02-18
 * Time: 09:25
 */

$naam = $_POST["naam"];
$wachtwoord = $_POST["wachtwoord"];
$email = $_POST["email"];

require('connect.php');

$checkUser = $conn->prepare("SELECT * FROM formulier WHERE name = :naam");
$checkUser->bindParam("naam", $naam);
$checkUser->execute();

if ($checkUser->rowCount() < 1) {

    $insertuser = $conn->prepare("INSERT INTO formulier (name, password, email) VALUES (:naam, :wachtwoord, :email)");
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_BCRYPT);
    $insertuser->bindParam("naam", $naam);
    $insertuser->bindParam("wachtwoord", $wachtwoord);
    $insertuser->bindParam("email", $email);
    $insertuser->execute();
    echo "je bent geregistreerd";
} else {
    echo "Gebruikersnaam bestaat al";
}


