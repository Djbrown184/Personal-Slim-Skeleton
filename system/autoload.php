<?php

    function autoload($chemin)
    {
        global $app;
        $nom_repertoire = $chemin;
        $pointeur       = opendir($nom_repertoire);

        while($fichier = readdir($pointeur)):
            if(($fichier != '.') && ($fichier != '..') && ($fichier != 'autoload.php') && ($fichier != 'settings.php')):
                if(is_dir($nom_repertoire . '/' . $fichier)):
                    autoload($nom_repertoire . '/' . $fichier);
                else:
                    require $nom_repertoire . '/' . $fichier;
                endif;
            endif;
        endwhile;

        closedir($pointeur);

    }

    autoload(__DIR__);