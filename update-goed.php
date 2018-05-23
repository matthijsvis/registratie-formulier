<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 09-04-18
 * Time: 12:59
 */

session_start();

require "connect.php";

$user = $_POST["name"];
$mail = $_POST["email"];
$id = $_SESSION["userid"];

$checkUser = $conn->prepare("SELECT * FROM formulier WHERE name = :naam");
$checkUser->bindParam("naam", $user);
$checkUser->execute();

if ($checkUser->rowCount() < 1) {

    $updateUser = $conn->prepare("UPDATE formulier SET name = :naam, email = :email WHERE id = :id");
    $updateUser->bindParam(":naam", $user);
    $updateUser->bindParam(":email", $mail);
    $updateUser->bindParam(":id",$id);
    $updateUser->execute();
    echo "je account is up to date.";
} else {
    echo "Gebruikersnaam bestaat al";
}