<section id="grand_questionnaire">
    <form action="traitement_1.php" method="post">
        <div class="questionnaire">
                <div class="col" id="params">
                    <label for="checkbox-block" class="valid" id='params_button'>Autres paramètres</label>
                    <input id="checkbox-block" name="checkbox-block" type="checkbox"/>
                    <div id='autres_params'>
                        <ul style="visibility:visible">
                            <li><label for="nx">Nombre de pixels : </label><input type='number' id="nx" value='<?php echo $_SESSION['nx'] ?>' name='nx' step='1' max='10000' min='10'></li>
                            <li><label for="itermax">Nombre d'itérations : </label><input type='number' id="itermax" value='<?php echo $_SESSION['itermax'] ?>' name='itermax' step='1' max='1000' min='10'></li>
                            <li><label for="ordre">Ordre de la fractale : </label><input type='number' id="ordre" value='<?php echo $_SESSION['ordre'] ?>' name='ordre' step='0.1' max='10' min='-10'></li>
                            <li><label for="colormap">Colormap : </label><select name="colormap" id="colormap">
                                <option value="vert">Vert</option>
                                <option value="rose">Rose</option>
                                <option value="vert_2" selected='selected'>Vert élaboré</option>
                                <option value="rose_2">Rose élaboré</option></select>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class='col'>
                    <li><label for="real">Partie Réelle : </label><input type='number' id="real" value='<?php echo $_SESSION['real'] ?>' name='real' step='0.01' max='2' min='-2'></li>
                    <li><label for="imag">Partie Imaginaire : </label><input type='number' id="imag" value='<?php echo $_SESSION['imag'] ?>' name='imag' step='0.01' max='2' min='-2'></li>
                </ul>

                <input type="submit" value="Générer l'ensemble de Julia" class="valid col" id="generer"/>
        </div>
        <div class="questionnaire">
            <input type="submit" value="Choix Aléatoire !" name='random' class="valid" id="random_button"/> 
        </div>
    </form>
</section>



