<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 09-03-18
 * Time: 10:17
 */
session_start();

require('connect.php');

/*schrijft de sql query*/
$selectUser = $conn->prepare("SELECT * FROM formulier WHERE name=:naam");
/*koppelt de pdo variabele*/
$selectUser->bindParam(":naam", $_POST['naam']);
/*voert de query uit*/
$selectUser->execute();

/*checkt of je account bestaat*/
if ($selectUser->rowCount() == 1) {
    /*haalt de resultaten uit de database*/
    $user = $selectUser->fetch(PDO::FETCH_ASSOC);

    if (password_verify($_POST["wachtwoord"], $user["password"])) {
        echo "wachtwoord klopt! :) <br>";

        $_SESSION["name"] = $user['name'];
        $_SESSION["email"] = $user["email"];
        $_SESSION["userid"] = $user['id'];
        $_SESSION["admin"] = $user['admin'];


    } else {
        echo "wachtwoord is fout! :(";
    }
} else {
    echo "U heeft nog geen account";
}
if (isset($_SESSION['name'])) {
    echo "Welkom ";
    echo $_SESSION['name'];
    echo "<br>";

    echo "<a href='gebruikers.php'><br>klik hier om alle gebruikers te zien.</a> <br>";

   echo "<a href='update.php'>Klik hier om je account te updaten</a>";


}
