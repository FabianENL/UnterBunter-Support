<?php include('./includes/init.php');?>

<?php
if(isset($_POST["newChat"])){
    if(isset($_SESSION['userID'])){
        $stmt = $conn->prepare("INSERT INTO chats (ownerId, subject) VALUES (?, ?);");
        $stmt->bind_param('ss', $_SESSION["userID"], $_POST["subject"]);
        $stmt->execute();

        $last_id = mysqli_insert_id($conn);
        echo $last_id;
    }else{
        echo "<script>alert('U moet eerst inloggen om dit te doen');location.href = \"login.php\"</script>";
    }
}

if(isset($_POST["newMessage"])){
    if(isset($_SESSION["chat"])){
        $stmt = $conn->prepare("INSERT INTO messages (ownerId, chatId, content, date) VALUES (?, ?, ?, ?);");
        $stmt->bind_param('ssss', $_SESSION["userID"], $_SESSION["chat"], $_POST["content"], date("Y-m-d"));
        $stmt->execute();

        $last_id = mysqli_insert_id($conn);
        echo $last_id;
    }else{
        echo "<script>alert('Er is iets fout gegaan... Probeer het opnieuw.');location.href = \"login.php\"</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>UnterBunter Support | Contact</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/Jetbrains-mono.css">
        <link rel="stylesheet" href="css/contact.css">
        <?php include("./includes/scripts.php"); ?>
    </head>
    <body id="main">
        <?php include('./includes/header.php') ?>
        <div class="chats" id="chats">
        <?php
            if(isset($_GET["chat"])){
                echo "<a href=\"contact.php?chat=".$_SESSION["chat"]."\" id=\"ververs\">Ververs</a>";
                $SQL = "SELECT * FROM chats WHERE chatID='".$_GET["chat"]."'";
                $row = mysqli_fetch_all(mysqli_query($conn, $SQL));
                $SQL = "SELECT * FROM users WHERE mail='".$_SESSION["mail"]."'";
                $row2 = mysqli_fetch_all(mysqli_query($conn, $SQL));
                
                if(strcmp($row[0][1], $row2[0][3]) == 0 || strcmp($_SESSION['type'], 1) == 0){
                    $_SESSION["chat"] = $_GET["chat"];
                    echo "<h1 id=\"title\">Chat: ".$row[0][2]."</h1>\n";
                    echo "<h3 id=\"id\">Chat ID: ".$row[0][0]."</h3>\n";
                    $SQL = "SELECT * FROM messages WHERE chatId=".$_GET["chat"];
                    $messages = mysqli_fetch_all(mysqli_query($conn, $SQL));
                    foreach($messages as $message){
                        $sender = mysqli_fetch_all(mysqli_query($conn, "SELECT mail FROM users WHERE userID=".$message[1]))[0];
                        echo "<div class=\"message\">";
                        echo "<h3>".$sender[0]."</h3>";
                        echo "<h4>".$message[4]."</h4>";
                        echo "<p>".$message[3]."</p>";
                        echo "</div>";
                    }
                }
                echo "<div class=\"newMessage\">";
                echo "<form class=\"request\" action=\"contact.php?chat=".$_SESSION["chat"]."\" method=\"post\">";
                echo "<textarea name=\"content\" rows=\"4\" cols=\"50\" placeholder=\"Schrijf hier uw eerste bericht\"></textarea><br>";
                echo "<input type=\"submit\" name=\"newMessage\" value=\"Verstuur\"/>";
                echo "</div>";
            }else{
                // Openstaande chats
                if(isset($_SESSION["mail"])){
                    echo "<h1>chats</h1>";
                    $SQL = "";
                    if(strcmp($_SESSION['type'], 1) == 0){
                        $SQL = "SELECT * FROM chats";
                    }else{
                        $SQL = "SELECT * FROM chats WHERE ownerId=".$_SESSION["userID"];
                    }
                    $row = mysqli_fetch_all(mysqli_query($conn, $SQL));

                    foreach($row as $rij){
                        echo "<a href=\"contact.php?chat=".$rij[0]."\" class=\"chat\">".$rij[2]."</a><br>";
                    }
                    echo "<button onclick=\"hide()\" class=\"newChat\">Maak een nieuwe chat aan</button>";
                    echo "<form class=\"request\" action=\"contact.php\" method=\"post\">";
                    echo "<input type=\"text\" name=\"subject\" placeholder=\"Onderwerp\" class=\"hide\" style=\"display: none\"> ";
                    echo "<textarea name=\"message\" rows=\"4\" cols=\"50\" placeholder=\"Schrijf hier uw eerste bericht\" class=\"hide\" style=\"display: none\"></textarea>";
                    echo "<input type=\"submit\" name=\"newChat\" value=\"Verstuur\" class=\"hide\" style=\"display: none\"ml />";
                }else{
                    echo "U moet eerst <a href=\"login.php\">inloggen</a>";
                }
            }
        ?>
        </div>
    </body>
</html> 
