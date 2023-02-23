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
    <head>
        <title>UnterBunter Support | Homepagina</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/Jetbrains-mono.css">
    </head>
    <body>
        <div class="header">
            <h1>UnterBunter Support</h1>
            <div class="opties">
                <div></div>
                <h3><a href="#">Reparaties</a></h3>
                <h3><a href="#">Service</a></h3>
                <h3><a href="#">Contact</a></h3>
                <h3><a href="#">Account</a></h3>
                <div></div>
            </div>
        </div>
        <div class="login">
        <?php
            if (!empty($_GET)) {
                if ($_GET["register"] == "1") {
                    echo "Hallo!";
                }
            } else {
                echo "<form action=\"login.php\" method=\"post\"> \n";
                echo "    <input type=\"email\" name=\"mail\" placeholder=\"E-mail\"><br> \n";
                echo "    <input type=\"password\" name=\"pass\" placeholder=\"Wachtwoord\"><br> \n";
                echo "    <input type=\"submit\" value=\"Inloggen\" name=\"login\"> \n";
                echo "    <a href=\"login.php?register=1\">Heeft u nog geen account? maak er dan snel een aan!</a>\n";
                echo "</form> \n";
            }
        ?>
        </div>
    </body>
</html>