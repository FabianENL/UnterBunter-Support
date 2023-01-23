<?php
include('./init.php');

if (!empty($_POST)) {
    if (isset($_POST["login"])) {
        $mail = $_POST["mail"];
        $pass = $_POST["pass"];
        $succes = false;
        $SQL = "SELECT * FROM users";

        $row = mysqli_fetch_all(mysqli_query($conn, $SQL));
        foreach ($row as $rij) {
            if ($rij[0] == $mail && md5($rij[1]) == $pass) {
                echo "<script>alert('Inlog geslaagd!')</script>";
                $_SESSION['mail'] = $mail;
                $succes = true;
                break;
            }
        }
        if (!$succes) {
            echo "<script>alert('Inlog gefaald!')</script>";
        }
    }
    if (isset($_POST["signup"])) {

    }
}
?>

<!DOCTYPE html>
<html>

<head></head>

<body>
    <?php
    if (!empty($_GET)) {
        if ($_GET["register"] == "1") {

        }
    } else {
        echo "<form action=\"login.php\" method=\"post\"> \n";
        echo "    <input type=\"email\" name=\"mail\" placeholder=\"E-mail\"><br> \n";
        echo "    <input type=\"password\" name=\"pass\" placeholder=\"Wachtwoord\"><br> \n";
        echo "    <input type=\"submit\" value=\"Inloggen\" name=\"login\"> \n";
        echo "</form> \n";
    }
    ?>

</body>

</html>