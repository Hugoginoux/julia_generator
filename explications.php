<!DOCTYPE html>
<html lang='fr'>
    <head>
        <meta charset=utf-8/>
        <link rel="stylesheet" href="julia.css"/>
        <title>Julia Generator</title>
    </head>

    <body class="grande_galerie">

        <?php include "header.php"?>

        <?php include "footer.php" ?>

        <h2>Un peu de maths</h2>

        <p class="math">
            La construction de ces images repose <strong>uniquement</strong> sur l'itération de cette fonction : <img src="image/latex/fonction.png">
            <br/><br/>

            Pour tout complexe c, <strong>l'ensemble de Julia</strong> d'ordre d de c est défini par <img src="image/latex/julia.png"> (l'exposant désigne la composition).
            Il est donc constitué de tous les complexes dont la suite <img src="image/latex/suite.png"> reste proche de zéro (ne diverge pas).

            <br/><br/>

            En pratique, pour construire informatiquement l'ensemble de Julia on procède comme ceci :<br/>
            
                - On divise le plan complexe comme une grille de carrés plus ou moins grands selon la précision de l'image que l'on recherche.</br>
                - Pour chaque élément z du grillage, on calcule <img src="image/latex/f(z).png">, <img src="image/latex/f2(z).png">, <img src="image/latex/f3(z).png">...
                jusqu'à atteindre le nombre d'itérations maximal fixé à l'avance.<br/>
                - Si l'un des éléments a un module > 2, alors le point de départ z n'est pas dans l'ensemble de Julia et on le colorie d'une certaine couleur.
                 Dans le cas contraire, z est dans l'ensemble et on peut le colorier d'une autre couleur.<br/>
                - Pour obtenir de belles images, il suffit de colorer avec des couleurs différentes selon la vitesse de divergence des points 
                (la première fois où le module dépasse 2)
                
        </p>

        <h2>Explication des paramètres</h2>

        <div class='math'>
            <dl>
                <dt class='bold'>Partie Réelle et Partie Imaginaire</dt>
                <dd>Le paramètre c étant un nombre complexe, il possède une partie réelle et une partie imaginaire. Pour trouver des images sympathiques,
                    je vous conseille de commencer par régler les deux assez proches de 0, puis de vous en éloigner progressivement.
                </dd>
                <dt>Nombre de pixels</dt>
                <dd>Il s'agit du nombre de pixels sur un axe de l'image en sortie. Si vous le fixez à 500, l'image aura 500x500=250 000 pixels. 
                    Attention, le temps de calcul sera aussi plus long. Pour donner un ordre de grandeur, il faut environ 2 secondes pour une
                    image 200x200, 5 minutes pour une image 3000x3000. <br/>
                    L'algorithme qui génère ces fractales a une complexité quadratique, c'est à dire que si vous multipliez le nombre de pixels par 10,
                    il faudra attendre 100 fois plus longtemps..
                </dd>
                <dt>Nombre d'itérations</dt>
                <dd>Le nombre de fois où on itère la fonction <img src="image/latex/f(z).png"> pour chaque pixel. L'augmenter pourra améliorer la fidélité
                de l'image à la fractale réelle (obtenue théoriquement avec un nombre d'itérations infini), mais l'image sera plus sombre et peut-être moins jolie.<br/>
                Avec la valeur par défaut de 100, on obtient des images de qualité, mais n'hésitez pas à jouer avec ce paramètre pour voir ce que ça fait.
                </dd>
                <dt>Ordre de la fractale</dt>
                <dd>C'est le paramètre d dans la définition de l'ensemble de Julia (l'exposant de z).<br/>
                Les ensembles de Julia "traditionnels" sont obtenus avec d=2, mais n'hésitez pas à être créatifs ! Les valeurs 0 et 1 ne donneront rien,
                mais vous pouvez essayer des valeurs négatives, et même fractionnaires ! Ces dernières donneront toutefois des fractales qui semblent "incomplètes" :
                c'est dû au fait que les nombres complexes possèdent plusieurs racines, et que l'ordinateur est obligé de faire un choix entre celles-ci. Quant aux valeurs négatives,
                je n'ai rien trouvé de très convaincant.<br/>
                Un jour je ferai peut-être une version "hardcore" où ce paramètre pourra être complexe.
                </dd>
                <dt>Colormap</dt>
                <dd>C'est la façon de colorier le dessin. Je conseille très fortement de choisir "Vert élaboré" ou "Rose élaboré", mais vous pouvez 
                    tenter les autres pour regarder.
                </dd>
        </div>

        <h2>C'est quoi une fractale ?</h2>

        <div class='math'>
            Les images obtenues sont très souvent des <strong>fractales</strong>. Cela signifie que le bord de la figure est infiniment
            complexe : on peut zoomer autant qu'on veut, on découvrira toujours de nouveaux détails. Il est même possible de retrouver l'image 
            de départ... à l'intérieur d'elle-même ! Ces objets sont donc non seulement très beaux, mais extrêmement intéressants et les 
            mathématiciens adorent leur chercher de nouvelles propriétés. Il existe sur Youtube moult vidéos montrant des zooms vertigineux
            sur des fractales, je vous encourage à aller regarder c'est spectaculaire !

            <ul id='mand'>
                <li><a href='image/mandelbrot.jpg' target="_blank"><img src='image/mandelbrot.jpg' class='fractale'></a>
                    <figcaption>L'ensemble de Mandelbrot, sans doute la fractale<br/> la plus célèbre et fascinante du monde</figcaption>
                <li>
                <li><a href='image/mandelbrot_zoom.jpg' target="_blank"><img src='image/mandelbrot_zoom.jpg' class='fractale'></a>
                    <figcaption>Zoom sur l'ensemble de Mandelbrot. On voit bien qu'au bout du pic<br/> se trouve une réplique miniature de l'ensemble tout entier !</figcaption>
                <li>
            </ul>


        </div>

    </body>

</html>