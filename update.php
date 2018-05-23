<?php
/**
 * Created by PhpStorm.
 * User: matthijs
 * Date: 06-04-18
 * Time: 09:02
 */
session_start();

require "connect.php";

$id = $_SESSION["userid"];

/*schrijft de sql query*/
$selectUser = $conn->prepare("SELECT * FROM formulier WHERE id=:id");
/*koppelt de pdo variabele*/
$selectUser->bindParam(":id", $id);
/*voert de query uit*/
$selectUser->execute();

$user = $selectUser->fetch();

?>

    <form action="update-goed.php" method="post">
        <fieldset>
            <legend>Update formulier</legend>
            <label for="naam">Naam</label>
            <input type="text" id="naam" name="name" value="<?php echo $user['name'] ?>">
            <label for="mail">E-mail</label>
            <input type="email" id="mail" name="email" value="<?php echo $user['email'] ?>">
            <input type="submit" VALUE="Update" name="update">
        </fieldset>
    </form>

<?php
