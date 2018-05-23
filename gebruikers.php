<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 21-03-18
 * Time: 10:11
 */
session_start();

require "connect.php";

//$admin = $conn->prepare("SELECT * FROM formulier WHERE admin");


if ($_SESSION["admin"] > 0){

    $gebruikers = $conn->prepare("SELECT * FROM formulier");
    $gebruikers->execute();
    $users = $gebruikers->fetchAll();
?>
    <table width="50%" border="1px solid black">
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Email</th>
        </tr>
    <?php

    foreach ($users as $user){
        echo "<tr>";
        echo "<td>" . $user["id"] . "</td>";
        echo "<td>" . $user["name"] . "</td>";
            echo "<td>" . $user["email"] . "</td>";
    }
    ?>
    </table>
        <?php
}else{
    echo "je bent geen admin";
}
