     <!DOCTYPE html>
     <html lang="en">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     
         <link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="css/apprenant.css">
         <link href="/chemin-vers-fontawesome/css/all.css" rel="stylesheet">
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     
     
     
         
     </head>
     <body>
     <?php
                             include "../models/presence.php";
                          
                             $val=$_SESSION['idPromo'];
                             $apprenant=listePresences($val);
                             $referent=referent($val);
                              // filtre appreann header
                              if(isset($_POST['searchG'])){
                                $search=$_POST['searchG']; 
                               
                             }
                             if(!empty($search)){
                                $listefiltres=array_filter($apprenant,function($appres) use ($search){
                                    return $appres['prenom']==$search;
                                });
                                // redefinir le tableau filtre
                                $apprenant=array_values($listefiltres);
                              
                               
                            }
                           
                            $totalElementsFiltres =ceil(count($apprenant)) ;


                             // filtre appreann main
                                // verification si searc existe
                             if(isset($_POST['search'])){
                                $app=$_POST['search'];
                               
                               
                             }

                            if(!empty($app)){
                                $listefiltre=array_filter($apprenant,function($appre) use ($app){
                                    return $appre['nom']==$app;
                                });
                                // redefinir le tableau filtre
                                $apprenant=array_values($listefiltre);



                            }
                           
        //filtre refrentiele
        if(isset($_POST['referentiel'])){
            $app=$_POST['referentiel'];
           
         }

        if(!empty($app)){
            $listefiltre=array_filter($apprenant,function($appre) use ($app){
                return $appre['referentiel']==$app;
            });
            // redefinir le tableau filtre
            $apprenant=array_values($listefiltre);
        } 
                           
         // Vérification si les filtres status et referentiel sont vides
         $referentielFiltreVide = empty($_POST['referentiel']) || $_POST['referentiel'] == 'referentiel';
 
         // Charger la liste complète des présences si les filtres sont vides
         if ($referentielFiltreVide) {
             $apprenant = listePresences($val);
         }
                                
                                $elementsParPage = 3;
                                $pages = isset($_GET['pages']) ? $_GET['pages'] : 1;
                                $decal = ($pages - 1) * $elementsParPage;
    

                                // Pagination des présences filtrées
                                $presencesPaginees = array_slice($apprenant, $decal, $elementsParPage);
                  ?>
         <main>
                    <h2 style="display: flex; justify-content: space-between;" class="title titleapp">
                        <p class="promot">Apprennants</p>
                        <p class="promos"> Promos  </p>
                        <p class="promos"> <span>></span>listes</p>
                        <p class="promos"> >detail>apprennants</p>  
                    </h2>
             <br>              
             <div class="promo2">
                 <p>Promotion:<span> promotion (<?php  echo $val?>)</span></p>
<!--                  <p class="pro">Referentiel: <span>Dev Web/mobile</span></p>
 -->    
                      
            <p class="pro"><span style="margin-left:600px;">Referentiel: </span> <span>
            <form action="" method="POST">
    <input type="hidden" name="page" value="pre">
    <div class="entete" style="display:flex;">

       
        <div class="select2" style="margin-top:1em">
        <button type="submit">
            <select name="referentiel">
                <option value="referentiel" <?php if(isset($_POST['referentiel']) && $_POST['referentiel'] == 'referentiel') echo 'selected'; ?>>referentiel</option>
                <?php foreach($referent as $select):?>

                <option value=<?php echo $select['refe'] ?> <?php if(isset($_POST['referentiel']) && $_POST['referentiel'] == $select['refe']) echo 'selected'; ?>><?= $select['refe']?></option>
                </button>
                <?php endforeach?>
            </select>
            
        </div>
       
   
    </div>
</form> 


             </div>
             <div class="contenu" style="height: 38em; width:90em">
                 <h3>Apprennants</h3>
                 <div class="champ">
                     <label for="libellé">Listes des apprenants</label>
                     <div class="contai" style="display: flex; margin-left: -3em; ">
                         <div class="containerr">
                             <input type="checkbox" id="click">
                             <label for="click" class="click-me" style="background-color: #16A085;"><p>Nouveau</p> </label>
                            
                             <div class="center">
                             <div class="fond"></div>
                             <div class="fond2" style="
                               background-color:grey;
                                 width: 25em;
                                 height: 100em;
                                 position: absolute;
                                 z-index:-1 ;
                                 opacity: 0.3;
                                 left: -25em;
                                 padding-top: 20em;
                             "></div>
                                <div class="fond2" style="
                               background-color:grey;
                                 width: 120em;
                                 height: 20em;
                                 position: absolute;
                                 z-index:-1 ;
                                 opacity: 0.3;
                                 top:-20em;
                                 left:-25em;
     
                                 padding-top: 20em;
                             "></div>
                             
     
     
                                 <div class="headerr" style="display: flex; justify-content: space-between;">
                                     <h2>Nouvel Apprennant</h2>
                                 <label for="click" class="fas fa-times" style="position: relative; left: -9em; top:-0.4em" ></label>
                                 </div>
                                 <div class="part2" style="display: flex;justify-content: space-around;">
                                     <div class="info" >
                                         
                                         <p> informations preso</p>
                                     </div>
                                     <div class="infsup">
                                         
                                         <p> informations Supplémentaires</p>
                                     </div>
                                 </div>
                                 <div class="form" style="display: flex; gap: 1em;">
                                     <form action="">
                                         <label for="">nom & prenom tuteur</label>
                                         <input type="text " placeholder="Entrer le nom et le prenom du tuteur"> 
                                     </form>
                                     <form action="">
                                         <label for="">Contact tuteur <span style="color :red">*</span></label>
                                         <input type="text " placeholder="Entrer le conatct du tuteur"> 
                                     </form>
                                     
                                 </div>
                                 <div class="form" style="display: flex; gap: 1em;">
                                     <form action="">
                                         <label for="">Photocopie CNI </label>
                                         <input type="file " placeholder=""> 
                                     </form>
                                     <form action="">
                                         <label for="">Extrait de naissance <span style="color :red">*</span></label>
                                         <input type="file " placeholder="Entrer le conatct du tuteur"> 
                                     </form>
                                     
                                 </div>
                                 <div class="form" style="display: flex; gap: 1em;">
                                     <form action="">
                                         <label for="">Diplôme</label>
                                         <input type="file " > 
                                     </form>
                                     <form action="">
                                         <label for="">Casier judiciare <span style="color :red">*</span></label>
                                         <input type="file "> 
                                     </form>
                                     
                                 </div>
                                 <div class="form" style="display: flex; gap: 1em;">
                                     <form action="">
                                         <label for="">Visite Médicale</label>
                                         <input type="file " > 
                                     </form>
                                  
                                     
                                 </div>
                                 <div class="bts" style="display: flex;"> 
                                 <label for="click" class="fas fa-times">cancel</label>
                                 <a href="" class="a"> <span>+</span> créer nouvel apprenant</a>
                             </div>
             
                     
                             </div>
                         </div>
                         <div class="containerr">
                             <input type="checkbox" id="click">
                             <label for="click" class="click-me" style="background-color: orange;"> <p>insertion en masse</p></label>
                             <div class="center">
                                 <div class="headerr">
                                     <h2>pop-up</h2>
                                 <label for="click" class="fas fa-times"></label>
                                 </div>
                                 <label for="click" class="fas fa-check"></label>
                                 <label for="click" class="close-btn">close</label>
                     
                             </div>
                         </div>
                         <div class="containerr">
                             <input type="checkbox" id="clicks">
                             <label for="clicks" class="click-mee" style="background-color: #3498DB;"><p>Fichier model</p></label>
                             <div class="center1">
                                 <div class="headerr">
                                     <h3>Choisir un fichier Excel</h3>
                                 </div>
                                 <div class="border"><input type="file" style="border: none;"></div>
                                 <label for="clicks" class="fermer" >fermer</label>
                                 <label for="clicks" class="close-btn">Enregistrer</label>
                     
                             </div>
                         </div>
                         <div class="containerr">
                             <input type="checkbox" id="click">
                             <label for="click" class="click-me" style="background-color: #1238D5;"><p>Listes des Exclus</p></label>
                             <div class="center">
                                 <div class="headerr">
                                     <h2>pop-up</h2>
                                 <label for="click" class="fas fa-times"></label>
                                 </div>
                                 <label for="click" class="fas fa-check"></label>
                                 <label for="click" class="close-btn">close</label>
                     
                             </div>
                         </div>
                     </div>          
                     </div>
                     <form action="" method="POST">

                     <input type="text" class="icon" name="search"  placeholder="Rechercher par matricul">
                    </form>
                    
                    
                     <div class="img"><img src="../publics/img/doss.png" alt="" width="100em " style="margin-left: 8em;"></div>
                     <div class="tableau" style="margin-left: 8em;">
                     
                       
                         <table class="table" style="line-height: 1em;">
                        
                         <tr>
                                 <th>img</th>
                                 <th>Nom</th>
                                 <th>Prenom</th>
                                 <th>Email</th>
                                 <th>Genre</th>
                                 <th>Telephone</th>
                                 <th>Action</th>
                                 <th>ref</th>
                               
                             </tr>
                         
                             
                        <?php
                         foreach($presencesPaginees as $liste):
                             ?>
                         <tr>
     
                        
                       
                            <td><img src="../publics/img/logo.png" width="25px" alt="" style="border-radius:100em;background-color:black; height:25px"></td>
                             <td><?php echo $liste['nom']; ?></td>
                             <td><?php echo $liste['prenom']; ?></td>
                             <td><?php echo $liste['email']; ?></td>
                             <td><?php echo $liste['genre']; ?></td>
                             <td><?php echo $liste['telephone']; ?></td>
                             <td><?php echo $liste['referentiel']; ?></td>


                           
                           
                             </tr>
                             <?php
                             endforeach
                             ?>
                             
                         </table>
                        </div>
     
                      <!-- pagiantion -->
 <div style="margin-left:70em">
     <?php if ($pages = 1) : ?>
         <a href="?page=app&pages=<?php echo ($pages + 1) ?>" ><</a>
     <?php endif ?>
     <?php for ($i = 1; $i <= ceil($totalElementsFiltres / $elementsParPage); $i++) : ?>
         <a href="?page=app&pages=<?php echo $i ?>" <?php if ($i == $pages) echo 'style="font-weight:bold;"' ?> ><?php echo $i ?></a>
     <?php endfor ?>
     <?php if ($pages < ceil($totalElementsFiltres / $elementsParPage)) : ?>
         <a href="?page=app&pages=<?php echo ($pages + 1) ?>">></a>
     <?php endif ?>
     </div> 
     
    </div>
      <!--  <h3>Référentiel</h3> -->
     
     
     
     
             
     
     
         </main>
     
         </body>
     