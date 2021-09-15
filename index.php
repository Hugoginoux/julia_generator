<?php session_start();
$_SESSION['real'] = 0;
$_SESSION['imag'] = 0;

$_SESSION['nx'] = 200;
$_SESSION['itermax'] = 100;
$_SESSION['ordre'] = 2;
$_SESSION['colormap'] = 'vert_2';
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

        <?php include "plot_wait.php"?>

        <?php include "footer.php"?>
    </body>

</html>