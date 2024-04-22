<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../publics/css/style.css">
</head>
<body>
    
    <input type="checkbox" name="" id="check">
    <?php 
        include '../models/referent.php';            
        $val = $_SESSION['idPromo'];
        $refs = referent($val); 

   $refs = isset($_SESSION['referentiels']) ? $_SESSION['referentiels'] : array(); 
  
        // Traitement du formulaire pour ajouter un nouveau référentiel
    $libelle = $description = '';
    $libelle_error = $description_error = '';
    if(isset($_POST['submit'])) {
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
    
        if (empty($libelle)) {
            $libelle_error = 'Veuillez saisir le libellé';
        }
        if (empty($description)) {
            $description_error = 'Veuillez saisir la description';
        }
    
        // Vérifier si le libellé existe déjà pour la promotion actuelle
        $libelles_existant = array_column($refs, 'refe');
        if (in_array($libelle, $libelles_existant)) {
            $libelle_error = 'Ce libellé existe déjà pour cette promotion.';
        }
    
        if (empty($libelle_error) && empty($description_error)) {
            // Ajouter le référentiel seulement si le libellé est unique
            $ajout_referentiel = ajouterReferentiel($libelle, $description, $val);
            if ($ajout_referentiel) {
                // Rafraîchir la liste des référentiels depuis la session
                $refs = referent($val);
            } else {
                echo "Erreur lors de l'ajout du référentiel.";
            }
        }
    }
           
    ?>
  
    <!-- menu -->
    <main>
        <h2 style="display: flex; justify-content: space-between;" class="title">
            <p class="promot">Referentiel</p>
            <p class="promos"> Promos  </p>
            <p class="promos"> <span>></span>creation</p>
        </h2>

        <div class="card cards" style="width: 22em;  height:20em;position:relative;left:75em;">
                <h3>Nouveau Référentiel</h3>
                <form action="" method="post">
            <label for="libelle">Libellé</label>
            <input type="text" name="libelle" id="libelle" class="icon" placeholder="Entrer le libellé" value="<?php echo htmlspecialchars($libelle); ?>">
            <?php if (!empty($libelle_error)): ?>
                <p style="color: red;"><?php echo $libelle_error; ?></p>
            <?php endif; ?>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="icon" placeholder="Entrer la description" value="<?php echo htmlspecialchars($description); ?>">
            <?php if (!empty($description_error)): ?>
                <p style="color: red;"><?php echo $description_error; ?></p>
            <?php endif; ?>
            <button type="submit" name="submit">Enregistrer</button>
        </form>
            </div>
        <div class="contenu1" style="margin-left:3em;display:flex;gap:2em">
        <div style="margin-left:10px;display:grid;width:50em;grid-template-columns: auto auto auto;width:20em;margin-top:-20em">

            <!-- Affichage des références existantes -->
            <?php 
                $count = 0; // Initialisation du compteur
                foreach ($refs as $ref): // Supposons que $refs soit votre tableau de références
                    $count++; // Incrémentation du compteur à chaque itération
            ?>
            <div class="card" style="height:19em;width:20em;margin-left:2em;"> 
                    <i class="fa fa-ellipsis-h" style="margin-top:3em;"></i>
                    <img src="../publics/img/classe.jpg" alt="" width="150px " class="img"></a> 
                    <form action="index.php?page=app" method="POST">
                   
                        <button type="submit" style="border:none;margin-left:1em;">
                            <input type="text" value="<?php echo $ref['refe']?>" name="referentiel"  
                                <?php if(isset($_POST['referentiel']) && $_POST['referentiel'] == $ref['refe']) echo 'readonly'; ?> 
                                readonly 
                                style="cursor:pointer;border:none;font-size:15px ;  Width:80px;" onclick="removeBorder(this);">
                        </button>
                    </form>
                    <p class="p p1"><span><?php echo $ref['action']?></span></p>

                    </div>
               
                    <?php 
            if ($count % 3 == 0) {
                echo '</div><div style="margin-left:1em;display:grid;width:50em;grid-template-columns: auto auto auto;">';
            }
            endforeach; 
        ?>            <!-- Formulaire pour ajouter un nouveau référentiel -->
           
        </div>
        </div>


        
      
    </main>

   
   
</body>
</html>
