<?php session_start();?>

<?php

    if (isset($_POST['random'])){
        $_SESSION['real'] = rand(-200,200)/100;
        $_SESSION['imag'] = rand(-200,200)/100;    
    }else{
        $_SESSION['real'] = $_POST['real'];
        $_SESSION['imag'] = $_POST['imag'];
    }

    $_SESSION['nx'] = $_POST['nx'];
    $_SESSION['itermax'] = $_POST['itermax'];
    $_SESSION['colormap'] = $_POST['colormap'];
    $_SESSION['ordre'] = $_POST['ordre'];

    ?>

<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset=utf-8/>
        <link rel="stylesheet" href="julia.css"/>
        <title>Julia Generator</title>
    </head>

    <body>

        <?php include "header.php"?>

        <?php include "form.php"?>

        <?php include "plot.php"?>

        <?php include "footer.php"?>
    </body>

</html>

