<?php
session_start();
$_SESSION["positionX"]=0;
$_SESSION["positionY"]=0;
$_SESSION['xmin']=-2;
$_SESSION['xmax']=1;
$_SESSION['ymin']=-1.5;
$_SESSION['ymax']=1.5;
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
            <img src="image/mandelbrot/mandelbrot_base.jpg" class='fractale' class="mandelbrot_img" id="mandelbrot" onclick="coords(event,'image'); document.getElementById('form').submit();">
            <form action="traitement_2.php" method="post" id="form" style="display:none">
                <input type="hidden" name="clickx" id="clickx" value="" />
                <input type="hidden" name="clicky" id="clicky" value="" />
            </form>
        
        </div>

    </body>
</html>