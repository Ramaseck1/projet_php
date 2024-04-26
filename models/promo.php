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

//lecture fichier json


function listePromojs() {
    // Lecture du fichier JSON
    $chemin_fichier_json = '../json/promo.json';

    $contenu_json = file_get_contents($chemin_fichier_json);

    // Décodage du JSON en un tableau associatif
    $donnees = json_decode($contenu_json, true);
    // Vérification des erreurs de décodage
    if ($donnees === null) {
        // Il y a eu une erreur lors du décodage JSON
        return array(); // Ou vous pouvez gérer l'erreur d'une autre manière
    }

    return $donnees['utilisateurs']; // Retourne le tableau d'utilisateurs
}

$chemin_fichier_json = '../json/connexion.json';

// Exemple d'utilisation :
$utilisateurs = listePromojs($chemin_fichier_json);

// Afficher les utilisateurs chargés
foreach ($utilisateurs as $utilisateur) {
}




    function checkPromo($idPromo) {
    $chemin = '../json/promo.json';
    $donnees = file_get_contents($chemin);
    $promos = json_decode($donnees, true);

    if ($promos !== null) {
        $promotionModifiee = false;
        foreach ($promos['utilisateurs'] as &$promo) {
            if ($promo['idPromo'] == $idPromo) {
                $promo['action'] = ($promo['action'] == '1') ? '0' : '1';
                $promotionModifiee = true;
            }
        }

        if (!$promotionModifiee) {
            echo "La promotion avec l'ID $idPromo n'a pas été trouvée.";
            return;
        }

        // Écrire les données mises à jour dans le fichier JSON
        file_put_contents($chemin, json_encode($promos, JSON_PRETTY_PRINT));
    } else {
        echo "Impossible de lire le fichier JSON.";
    }
}

function cocherPromotion($idPromo)
{
    $chemin = '../json/promo.json';
    $donnees = file_get_contents($chemin);
    $promos = json_decode($donnees, true);

    if ($promos !== null) {
        foreach ($promos['utilisateurs'] as &$promo) {
            if ($promo['idPromo'] == $idPromo) {
                $promo['action'] = '1';
            } else {
                $promo['action'] = '0';
            }
        }

        // Écrire les données mises à jour dans le fichier JSON
        file_put_contents($chemin, json_encode($promos, JSON_PRETTY_PRINT));
    } else {
        echo "Impossible de lire le fichier JSON.";
    }
}

function decocherPromotion($idPromo)
{
    $chemin = '../json/promo.json';
    $donnees = file_get_contents($chemin);
    $promos = json_decode($donnees, true);

    if ($promos !== null) {
        foreach ($promos['utilisateurs'] as &$promo) {
            if ($promo['idPromo'] == $idPromo) {
                $promo['action'] = '0';
            }
        }

        // Écrire les données mises à jour dans le fichier JSON
        file_put_contents($chemin, json_encode($promos, JSON_PRETTY_PRINT));
    } else {
        echo "Impossible de lire le fichier JSON.";
    }
}
      
    ?>
