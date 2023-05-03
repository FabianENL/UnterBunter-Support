<div class="header">

    <h1><a href="index.php">UnterBunter Support</a></h1>
    <div class="opties">
        <div></div>
        <h3><a href="reparaties.php">Reparaties</a></h3>
        <h3><a href="service.php">Service</a></h3>
        <h3><a href="#">Contact</a></h3>
        <h3><a href="login.php">Account</a></h3>
        <div class="switchdiv">
            <i id="sun" class="fa-solid fa-sun">
            <label class="switch">
                <input type="checkbox"  id="darkmode" name="checkbox" onchange="change()" <?php echo $_SESSION["darkmode"]; ?>/>
                <span class="slider round"></i></span>
            </label>
        </div>
        
        <div  id="sessionWrite"></div>
    </div>
</div>