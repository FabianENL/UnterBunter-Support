<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/a19e53c1a8.js" crossorigin="anonymous"></script>
<script src="js/index.js"></script>
<script>
    $(document).ready(function () {
        if(!document.getElementById("darkmode").checked){
            mode = "lightmode"
        }else{
            mode = "darkmode"
        }
        load(mode)
    });
</script>