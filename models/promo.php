<?php 


function listePromo(){
    $chemin = '../data/pro.csv';
    $fichier = fopen($chemin, "r");

    $promotions = []; 

    if ($fichier) {
        while (($ligne = fgetcsv($fichier)) !== false) {
            // Ajouter chaque ligne lue du fichier CSV dans le tableau $promotions
            $promotions[] = ['idPromo'=>$ligne[0],'libelle'=>$ligne[1],'dd'=>$ligne[2],'df'=>$ligne[3],'action'=>$ligne[4]];
        }
        fclose($fichier); 
    } else {
        echo "Impossible d'ouvrir le fichier.";
    }
    return $promotions;

}

    function checkPromo($idPromo) {
        $chemin = '../data/pro.csv';
        $lignes = file($chemin); 

        if ($lignes !== false) {
            $nouvellesLignes = []; 
            $promotionModifiee = false; 
            foreach ($lignes as $ligne) {
                $donnees = explode(',', $ligne); 
                if ($donnees[0] == $idPromo) { 
                    $donnees[4] = ($donnees[4] == '1') ? '0' : '1';
                    $promotionModifiee = true; 
                }
                $nouvellesLignes[] = implode(',', $donnees); 
            }

            if (!$promotionModifiee) {
                echo "La promotion avec l'ID $idPromo n'a pas été trouvée.";
                return; 
            }

            // Écrire les lignes mises à jour dans le fichier
            file_put_contents($chemin, implode("\n", $nouvellesLignes));
        } else {
            echo "Impossible de lire le fichier.";
        }
    }
    function cocherPromotion($idPromo) {
        $chemin = '../data/pro.csv';
        $lignes = file($chemin); 

        if ($lignes !== false) {
            $nouvellesLignes = [];
            foreach ($lignes as $ligne) {
                $donnees = explode(',', $ligne); 
                if ($donnees[0] == $idPromo) {
                    $donnees[4] = '1'; 
                } else {
                    $donnees[4] = '0';
                }
                $nouvellesLignes[] = implode(',', $donnees); 
            }
            // Écrire les lignes mises à jour dans le fichier
            file_put_contents($chemin, implode("\n", $nouvellesLignes));
        } else {
            echo "Impossible de lire le fichier.";
        }
    }

    function decocherPromotion($idPromo) {
        $chemin = '../data/pro.csv';
        $lignes = file($chemin); 

        if ($lignes !== false) {
            $nouvellesLignes = [];
            foreach ($lignes as $ligne) {
                $donnees = explode(',', $ligne); 
                if ($donnees[0] == $idPromo) {
                    $donnees[4] = '0'; 
                }
                $nouvellesLignes[] = implode(',', $donnees); 
            }
            // Écrire les lignes mises à jour dans le fichier
            file_put_contents($chemin, implode("\n", $nouvellesLignes));
        } else {
            echo "Impossible de lire le fichier.";
        }
    }

    ?>
