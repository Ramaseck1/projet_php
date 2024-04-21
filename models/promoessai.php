<?php 


function listePromo(){
    $chemin = '../data/pro.csv';
    $fichier = fopen($chemin, "r");

    $promotions = []; // Initialisation du tableau pour stocker les données des promotions

    if ($fichier) {
        while (($ligne = fgetcsv($fichier)) !== false) {
            // Ajouter chaque ligne lue du fichier CSV dans le tableau $promotions
            $promotions[] = ['idPromo'=>$ligne[0],'libelle'=>$ligne[1],'dd'=>$ligne[2],'df'=>$ligne[3],'action'=>$ligne[4]];
        }
        fclose($fichier); // Fermer le fichier
    } else {
        echo "Impossible d'ouvrir le fichier.";
    }
    return $promotions;

}

function checkPromo($idPromo) {
    $chemin = '../data/pro.csv';
    $lignes = file($chemin); // Lire toutes les lignes du fichier dans un tableau

    if ($lignes !== false) {
        $nouvellesLignes = []; // Initialiser un nouveau tableau pour stocker les lignes mises à jour
        $promotionModifiee = false; // Flag pour indiquer si la promotion a été modifiée
        foreach ($lignes as $ligne) {
            $donnees = explode(',', $ligne); // Séparer les données de chaque ligne
            if ($donnees[0] == $idPromo) { // Vérifier si l'ID de la promotion correspond
                // Inverser l'état actuel de la promotion
                $donnees[4] = ($donnees[4] == '1') ? '0' : '1';
                $promotionModifiee = true; // Indiquer que la promotion a été modifiée
            }
            $nouvellesLignes[] = implode(',', $donnees); // Réassembler les données de la ligne
        }

        if (!$promotionModifiee) {
            echo "La promotion avec l'ID $idPromo n'a pas été trouvée.";
            return; // Sortir de la fonction si la promotion n'a pas été trouvée
        }

        // Écrire les lignes mises à jour dans le fichier
        file_put_contents($chemin, implode("\n", $nouvellesLignes));
    } else {
        echo "Impossible de lire le fichier.";
    }
}
function cocherPromotion($idPromo) {
    $chemin = '../data/pro.csv';
    $lignes = file($chemin); // Lire toutes les lignes du fichier dans un tableau

    if ($lignes !== false) {
        $nouvellesLignes = []; // Initialiser un nouveau tableau pour stocker les lignes mises à jour
        foreach ($lignes as $ligne) {
            $donnees = explode(',', $ligne); // Séparer les données de chaque ligne
            if ($donnees[0] == $idPromo) {
                $donnees[4] = '1'; // Mettre à jour l'état de la promotion à 1 (cochée)
            } else {
                $donnees[4] = '0'; // Décocher les autres promotions
            }
            $nouvellesLignes[] = implode(',', $donnees); // Réassembler les données de la ligne
        }
        // Écrire les lignes mises à jour dans le fichier
        file_put_contents($chemin, implode("\n", $nouvellesLignes));
    } else {
        echo "Impossible de lire le fichier.";
    }
}

function decocherPromotion($idPromo) {
    $chemin = '../data/pro.csv';
    $lignes = file($chemin); // Lire toutes les lignes du fichier dans un tableau

    if ($lignes !== false) {
        $nouvellesLignes = []; // Initialiser un nouveau tableau pour stocker les lignes mises à jour
        foreach ($lignes as $ligne) {
            $donnees = explode(',', $ligne); // Séparer les données de chaque ligne
            if ($donnees[0] == $idPromo) {
                $donnees[4] = '0'; // Mettre à jour l'état de la promotion à 0 (décochée)
            }
            $nouvellesLignes[] = implode(',', $donnees); // Réassembler les données de la ligne
        }
        // Écrire les lignes mises à jour dans le fichier
        file_put_contents($chemin, implode("\n", $nouvellesLignes));
    } else {
        echo "Impossible de lire le fichier.";
    }
}

?>
