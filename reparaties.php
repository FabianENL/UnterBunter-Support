<?php include('./init.php') ?>

<!DOCTYPE html>
<html>
    <head>
        <title>UnterBunter Support | Reparaties</title>
        <link rel="stylesheet" href="css/reparaties.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/Jetbrains-mono.css">
        <script src="js/index.js"></script>
        <script src="https://kit.fontawesome.com/a19e53c1a8.js" crossorigin="anonymous"></script>
    </head>
    <body id="main">
        <?php 
        if(!isset($_SESSION["mail"])){
            echo "<script>alert('U moet eerst inloggen om dit te doen');location.href = \"login.php\"</script>";
        }
        ?>
        <div class="header">
            <h1><a href="index.php">UnterBunter Support</a></h1>
            <div class="opties">
                <div></div>
                <h3><a href="reparaties.php">Reparaties</a></h3>
                <h3><a href="service.php">Service</a></h3>
                <h3><a href="#">Contact</a></h3>
                <h3><a href="login.php">Account</a></h3>
                <div class="switchdiv">
                    <i class="fa-solid fa-sun">
                    <label class="switch">
                        <input type="checkbox" name="checkbox" onchange="change()" />
                        <span class="slider round"></i></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="repair">
            <table>
                <tr>
                    <th>Reparatie ID</th>
                    <th>Omschrijving</th>
                    <th>Status</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM mail";
                    $row = mysqli_fetch_all(mysqli_query($conn, $sql));
                    foreach ($row as $rij) {
                        if(strcmp($rij[4], $_SESSION['mail']) == 0){
                            $status = "";
                            switch ($rij[4]){
                                case 1:
                                    $status = "1/6 - Wachten op goedkeuring";
                                case 2: 
                                    $status = "2/6 - Wachten op apparaat";
                                case 3:
                                    $status = "3/6 - Probleem identificeren";
                                case 4:
                                    $status = "4/6 - Bezig met reparatie";
                                case 5:
                                    $status = "5/6 - Alles op werking controleren";
                                case 6:
                                    $status = "6/6 - Apparaat klaar om op te halen";
                            }
                            echo "<tr>\n".
                                 "  <th>{$rij[0]}</th>".
                                 "  <th>{$rij[3]}</th>".
                                 "  <th>$status</th>";
                        }
                    }
                ?>
            </table>
            <form action="reparaties.php" method="post">
                <input type="submit" value="Nieuwe reparatie aanvragen." name="request">
            </form>
            <?php 
                
                if(isset($_POST["request"])){
                        echo "<form class=\"request\" action=\"reparaties.php\" method=\"post\" >".
                        "   <input type=\"text\" name=\"first\" placeholder=\"Voornaam\"> ".
                        "   <input type=\"text\" name=\"last\" placeholder=\"Achternaam\">".
                        "   <textarea name=\"problem\" rows=\"4\" cols=\"50\" placeholder=\"Beschrijf hier uw probleem zo goed mogelijk\"></textarea>";
                }
            ?>
        </div>
    </body>
</html>