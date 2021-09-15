
<section id="plot">

    <h2>Voici l'image !</h2>

    <ul id="box">

        <li><a href='image/julia.jpg' target="_blank"><img src='image/julia.jpg' class='fractale'/></a></li>

        <li>
            <ul id="infos">

                <li>
                    <button type='button' class="valid"><a href='image/julia.jpg' download>Téléchargez l'image !</a></button>
                </li>

                <li><?php

                    if(isset($_SESSION['real']) && isset($_SESSION['imag']) && isset($_SESSION['nx']) && isset($_SESSION['itermax']) && isset($_SESSION['ordre'])){
                    echo 'Partie Réelle : ' . $_SESSION['real'] . '</br>' . 'Partie Imaginaire : ' . $_SESSION['imag'] . '</br>';
                    
                    $output=null;
                    $retval=null;
                    set_time_limit(300);
                    exec('python3 julia.py '.$_SESSION['real'].' '.$_SESSION['imag'].' '.$_SESSION['nx'].' '.$_SESSION['itermax'].' '.$_SESSION['colormap'].' '.$_SESSION['ordre'].'2>&1', $output, $retval);
                    print_r($retval);
                    echo '</br>';
                    print_r($output);}

                    ?></li>
            </ul>
        </li>
</section>