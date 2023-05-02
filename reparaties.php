<?php include('./init.php') ?>

<?php
    if(isset($_POST["newRequest"])){
        if(isset($_SESSION['mail'])){
            

            $stmt = $conn->prepare("INSERT INTO `ub-support`.`reparaties` (`voornaam`, `achternam`, `probleem`, `status`, `mail`) VALUES (?, ?, ?, 0, ?);");
            $stmt->bind_param('ssss', $firstName, $lastName, $problem, $mail); // 's' specifies the variable type => 'string'

            $mail = $_SESSION['mail'];
            $firstName = $_POST["first"];
            $lastName = $_POST["last"];
            $problem = $_POST["problem"];

            $stmt->execute();
        }else{
            echo "<script>alert('U moet eerst inloggen om dit te doen');location.href = \"login.php\"</script>";
        }
    }

    if(isset($_POST["repairUpdate"])){
        if(strcmp($_SESSION['type'], 1) == 0){
            $submitted_array = array_keys($_POST['repairUpdate'])[0];
            $stage = $_POST["values"];
            $SQL = "UPDATE reparaties SET status='$stage' WHERE  `id`=$submitted_array;";
            mysqli_query($conn, $SQL);
        }else{
            echo "<script>alert('Probeer niet hackerman te zijn... je hebt niet de juiste permissies');</script>";
        }
        
    }
?>



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
                <?php
                    $sql = "SELECT * FROM reparaties"; 
                    $fetch = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_all(mysqli_query($conn, $sql));
                    $status = array(
                        "0/5 - Wachten op goedkeuring",
                        "1/5 - Wachten op apparaat",
                        "2/5 - Probleem identificeren",
                        "3/5 - Bezig met reparatie",
                        "4/5 - Alles op werking controleren",
                        "5/5 - Apparaat klaar om op te halen"

                    );
                    if(strcmp($_SESSION['type'], 1) == 0){
                        echo"<tr>".
                            "   <th>Reparatie ID </th>".
                            "   <th>Omschrijving</th>".
                            "   <th>Status</th>".
                            "   <th>Email</th>".
                            "</tr>";
                        foreach ($row as $rij) {
                            echo "<tr>\n".
                                    "  <th>{$rij[0]}</th>".
                                    "  <th>{$rij[3]}</th>".
                                    "  <th>".
                                    $status[$rij[4]]."<br>".
                                    "<form action=\"reparaties.php\" method=\"post\">".
                                    "      <select name='values'>";
                                    if($rij[4] == 0){echo "<option value ='0' selected>0/5 - Wachten op goedkeuring</option>";}else{echo "<option value ='0'>0/5 - Wachten op goedkeuring</option>";};
                                    if($rij[4] == 1){echo "<option value ='1' selected>1/5 - Wachten op apparaat</option>";}else{echo "<option value ='1'>1/5 - Wachten op apparaat</option>";};
                                    if($rij[4] == 2){echo "<option value ='2' selected>2/5 - Probleem identificeren</option>";}else{echo "<option value ='2'>2/5 - Probleem identificeren</option>";};
                                    if($rij[4] == 3){echo "<option value ='3' selected>3/5 - Bezig met reparatie</option>";}else{echo "<option value ='3'>3/5 - Bezig met reparatie</option>";};
                                    if($rij[4] == 4){echo "<option value ='4' selected>4/5 - Alles op werking controleren</option>";}else{echo "<option value ='4'>4/5 - Alles op werking controleren</option>";};
                                    if($rij[4] == 5){echo "<option value ='5' selected>5/5 - Apparaat klaar om op te halen</option>";}else{echo "<option value ='5'>5/5 - Apparaat klaar om op te halen</option>";};
                                    echo "       </select> <br>".
                                    "       <input type=\"submit\" name=\"repairUpdate[{$rij[0]}]\" value=\"Update reparatie\">".
                                    "</form>".
                                     "  </th>".
                                     "  <th>{$rij[5]}</th>";
                        }
                    }else{
                        echo"<tr>".
                            "   <th>Reparatie ID </th>".
                            "   <th>Omschrijving</th>".
                            "   <th>Status</th>".
                            "</tr>";
                        foreach ($row as $rij) {
                            if(strcmp($rij[5], $_SESSION['mail']) == 0){
                                $statusText = $status[0];
                                echo "<tr>\n".
                                     "  <th>{$rij[0]}</th>".
                                     "  <th>{$rij[3]}</th>".
                                     "  <th>".$status[$rij[4]]."</th>";
                            }
                        }
                    }
                    
                ?>
            </table>
                <?php
                    if(strcmp($_SESSION['type'], 1) != 0){
                        echo "<form action=\"reparaties.php\" method=\"post\">";
                        echo "  <input type=\"submit\" value=\"Nieuwe reparatie aanvragen.\" name=\"request\">";
                        echo "</form>";
                    }
                ?>
            <?php 
                
                if(isset($_POST["request"])){
                        echo "<form class=\"request\" action=\"reparaties.php\" method=\"post\" required>".
                        "   <input type=\"text\" name=\"first\" placeholder=\"Voornaam\" required> ".
                        "   <input type=\"text\" name=\"last\" placeholder=\"Achternaam\" required>".
                        "   <textarea name=\"problem\" rows=\"4\" cols=\"50\" placeholder=\"Beschrijf hier uw probleem zo goed mogelijk\" required></textarea>".
                        "   <input type=\"submit\" name=\"newRequest\" value=\"Vraag aan\"";
                }
            ?>
        </div>
    </body>
</html>