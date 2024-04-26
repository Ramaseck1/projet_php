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

          

                             include "../models/connexion.php";

                             $utilisateurs=connexion();
                          


                         
                           
        
                  ?>
         <main>
                    <h2 style="display: flex; justify-content: space-between;" class="title titleapp">
                        <p class="promot">Administrateur</p>
                        <p class="promos"> Promos  </p>
                        <p class="promos"> <span>></span>listes</p>
                        <p class="promos"> >detail>apprennants</p>  
                    </h2>
             <br>              
             <div class="promo2">
<!--                  <p class="pro">Referentiel: <span>Dev Web/mobile</span></p>
 -->   

             </div>
             <div class="contenu" style="height: 38em; width:90em">
                 <h3>admin</h3>
<!--                  <input type="checkbox" style="visibility:visible;display: block; -webkit-appearance:button;">
 -->
                 <div class="champ">
                     <label for="libellé">Listes des admins</label>
                     <div class="contai" style="display: flex; margin-left: -3em; ">
                         <div class="containerr">
                             <input type="checkbox" id="click">
                             <label for="click" class="click-me" style="background-color: #16A085;margin-left:35em"><p>Nouveau</p> </label>
                            
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
                                     <h2>Nouvel admin</h2>
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
                                 <th>Email</th>
                                 <th>Genre</th>
                                 <th>type</th>
                               
                               
                             </tr>
                         
                             
                       
                         <tr>
     
                            <?php foreach($utilisateurs as $user): ?>
                             <?php if($user['type'] === 'admin'): ?>

                       
                            <td><img src="../publics/img/logo.png" width="25px" alt="" style="border-radius:100em;background-color:black; height:25px"></td>
                             <td><?= $user['nom']?></td>
                             <td><?= $user['email']?></td>
                             <td><?= $user['genre']?></td>
                             <td><?= $user['type']?></td>
                        
                         


                           
                           
                             </tr>
                             <?php endif ?>

                             <?php endforeach ?>

                           
                             
                         </table>
                        </div>
     
                   
     
    
     
     
             
     
     
         </main>
     
         </body>
     