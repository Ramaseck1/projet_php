<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../publics/css/connexion.css">
</head>
<body>
    <div class="container">
        <img src="../publics/img/logo.png" alt="" width="30%"> 
        <div class="content"> 
            <p>Email et Mot de Passe requis</p>
            <form action="">
                <label for="">Email Address <span style="color: red;">*</span></label> <br>
                <input type="text" placeholder="Entrer email address"> <br>
                <label for=""> Password</label> <br>
                <input type="text" name="" id="" placeholder="Entre votre password">  <br>
                
            </form>
            
        </div>
        <div class="main">
            <div style="display: flex;">
                <div style="position: relative; left: 7em;">
        <input type="checkbox">
        <label for="">Remember me</label>
    </div>
    <div style="position: relative; left: 20em;">
        <h4 style="color: #16A085; font-size: 1.3em;">Mot de passe oublié?</h4> 
    </div>
    </div>

        <div class="a">
            <a href="index.php?page=accueil"> <p> Log in</p</a>
        </div>
       

                </div>

    </div>
    
</body>
</html>









<input type="checkbox" name="" id="check">
    <?php 
        include '../models/referent.php';            
        $val = $_SESSION['idPromo'];
        $refs = referent($val); 
        $refs = isset($_SESSION['referentiels']) ? $_SESSION['referentiels'] : array(); 



        // Traitement du formulaire pour ajouter un nouveau référentiel
        if(isset($_POST['submit'])) {
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];

            // Ajout du nouveau référentiel aux référentiels existants
                       // Ajout du nouveau référentiel à la liste des référentiels
       
        
      
            // Ajout du nouveau référentiel à la liste des référentiels
            $new_referentiel = array('refe' => $libelle, 'action' => $description);
            $refs[] = $new_referentiel;

            // Mettre à jour la session avec les nouveaux référentiels
            $_SESSION['referentiels'] = $refs;
        }


           
    ?>
  
    <!-- menu -->
    <main style="width:20px;background-color:red">
    <div class="main1">
        <h2 style="display: flex; justify-content: space-between;" class="title">
            <p class="promot">Referentiel</p>
            <p class="promos"> Promos  </p>
            <p class="promos"> <span>></span>creation</p>
        </h2>
        
        <div class="contenu1" style="margin-left:7em; display:flex;">
            <!-- Affichage des référentiels existants -->
            <?php foreach($refs as $ref): ?>
             <div style=" display:flex;gap:2em; width:10px;flex-wrap:">
                <div class="card" style=" width:20em; height:19em; "> 
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

                </div>      
            <!-- Formulaire pour ajouter un nouveau référentiel -->
        </div>
      
            

       
 
    <div class="card cards" style="width: 32em; height:20em">
                <h3>Nouveau Référentiel</h3>
                <form action="" method="post">
                    <label for="libelle">Libellé</label>
                    <input type="text" name="libelle" id="libelle" class="icon" placeholder="Entrer le libellé">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="icon" placeholder="Entrer la description">
                    <button type="submit" name="submit">Enregistrer</button>
                </form>
            </div>
               </main>
            </div>
