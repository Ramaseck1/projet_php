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

/*         $refs = isset($_SESSION['referentiels']) ? $_SESSION['referentiels'] : array(); 
 */
        // Traitement du formulaire pour ajouter un nouveau référentiel
        if(isset($_POST['submit'])) {
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];

            // Ajout du nouveau référentiel à la liste des référentiels
            $new_referentiel = array('refe' => $libelle, 'action' => $description);
            $refs[] = $new_referentiel;

            // Mettre à jour la session avec les nouveaux référentiels
            $_SESSION['referentiels'] = $refs;
        }
           
    ?>
  
    <!-- menu -->
    <main sryle=" ;">
        <h2 style="display: flex; justify-content: space-between;" class="title">
            <p class="promot">Referentiel</p>
            <p class="promos"> Promos  </p>
            <p class="promos"> <span>></span>creation</p>
        </h2>
        <div style="margin-left:7em;display:flex">
        <?php foreach($refs as $ref): ?>

        <div class="contenu1" style="margin-left:7em;display:flex,">
            <!-- Affichage des référentiels existants -->
                <div class="card" style=" width:20em; height:19em;"> 
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
               
                <?php endforeach ?>     
            <!-- Formulaire pour ajouter un nouveau référentiel -->
            <div class="card cards" style="width: 22em;  height:20em">
                <h3>Nouveau Référentiel</h3>
                <form action="" method="post">
                    <label for="libelle">Libellé</label>
                    <input type="text" name="libelle" id="libelle" class="icon" placeholder="Entrer le libellé">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="icon" placeholder="Entrer la description">
                    <button type="submit" name="submit">Enregistrer</button>
                </form>
            </div>
        </div>
        </div>
    </main>
</body>
</html>
