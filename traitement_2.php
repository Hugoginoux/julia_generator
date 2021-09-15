<?php
session_start();
$taille_image=getimagesize("image/mandelbrot/mandelbrot.jpg")[0];

$_SESSION['positionX']=($_POST['clickx']/$taille_image)*($_SESSION['xmax']-$_SESSION['xmin'])+$_SESSION['xmin'];
$_SESSION['positionY']=(($_POST['clicky']/$taille_image)*($_SESSION['ymax']-$_SESSION['ymin'])+$_SESSION['ymin']);
?>

<?php echo $_SESSION['positionX'].'+ '.$_SESSION['positionY'].'j' ;
?>

<?php 
    $zoom=3;
    $delta = (($_SESSION['xmax']-$_SESSION['xmin'])/2)/$zoom;
    $_SESSION['xmin']=$_SESSION['positionX']-$delta;
    $_SESSION['xmax']=$_SESSION['positionX']+$delta;
    $_SESSION['ymin']=$_SESSION['positionY']-$delta;
    $_SESSION['ymax']=$_SESSION['positionY']+$delta;

    $output=null;
    set_time_limit(300);
    exec('py mandelbrot.py '.$_SESSION['xmin'].' '.$_SESSION['xmax'].' '.$_SESSION['ymin'].' '.$_SESSION['ymax'], $output);

    print_r($output);

?>



<!DOCTYPE html>
<html lang='fr'>


    <head>
        <meta charset=utf-8/>
        <link rel="stylesheet" href="julia.css"/>
        <title>Julia Generator</title>

    </head>

    <script type="text/javascript">
        
        function findPos(el){
            var x = y = 0;
            if(el.offsetParent) {
                x = el.offsetLeft - window.pageXOffset;
                y = el.offsetTop - window.pageYOffset;
                while(el = el.offsetParent) {
                x += el.offsetLeft;
                y += el.offsetTop;
                }
            }
            return {'x':x, 'y':y};
            }
            
            function coords(event,id){
            var x = event.clientX;
            var y = event.clientY;
            var pos = findPos(document.getElementById('mandelbrot')); // id étant l'identifiant que tu donnes à ton image
            var diffx = x - pos.x;
            var diffy = y - pos.y;
            if((diffx >= 0) && (diffx <= 1000) && (diffy >= 0) && (diffy <= 1000)){ // les valeurs "200" sont à remplacer par la largeur et la hauteur de ton image
                document.getElementById('clickx').value = diffx;
                document.getElementById('clicky').value = diffy;
            }
            }
        
    </script>

    <body class="grande_galerie">

    <?php include "header.php"?>

    <?php include "footer.php" ?>


    <h1>Mandelbrot Explorator</h1>

    <div class="galerie">
        <img src="image/mandelbrot/mandelbrot.jpg" class='fractale' class="mandelbrot_img" id="mandelbrot" onclick="coords(event,'image'); document.getElementById('form').submit();">
            
        <form action="traitement_2.php" method="post" id="form" style="display:none">
            <input type="hidden" name="clickx" id="clickx" value="" />
            <input type="hidden" name="clicky" id="clicky" value="" />
        </form>


    </div>



    </body>
</html>