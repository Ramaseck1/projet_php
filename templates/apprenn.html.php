

  
     
    
    <main>
        <h2 style="display: flex; justify-content: space-between;" class="title titleapp">
            <p class="promot">Apprennants</p>
            <p class="promos"> Promos  </p>
            <p class="promos"> <span>></span>listes</p>
            <p class="promos"> >detail>apprennants</p>
           
           
        </h2>
        <br>

        <div class="promo2" >
            <p>Promotion:<span>Promotion 6</span></p>
            <p class="pro">Referentiel: <span>Dev Web/mobile</span></p>
        </div>
        <div class="contenu" style="height: 35em; width:90em">

            <h3>Apprennants</h3>
            <div class="champ">
                <label for="libellé">Listes des apprenants</label>
               
                <div class="contai" style="display: flex; margin-left: -3em; ">
                    <div class="containerr">
                        <input type="checkbox" id="click">
                        <label for="click" class="click-me" style="background-color: #16A085;"><p>Nouveau</p> </label>
                       
                        <div class="center">
                        <div class="fond"></div>
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
                <input type="text" class="icon" value placeholder="Rechercher par matricul">
            
                <div class="img"><img src="Logo-Sonatel-Academy.png" alt="" width="100em " style="margin-left: 8em;"></div>
                <div class="tableau" style="margin-left: 8em;">
              
                    <table class="table" style="line-height: 1em;">
                    <?php
                        include "../models/apprennant.php";
                        ?>
                            <th>img</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Genre</th>
                            <th>Telephone</th>
                            <th>Action</th>
                        </tr>
                    
                        <tr> 
                   


                    <tr>
                         <td><img src="" alt=""></td>
                        <td><?php echo $listes['nom']; ?></td>
                        <td><?php echo $listes['prenom']; ?></td>
                        <td><?php echo $listes['email']; ?></td>
                        <td><?php echo $listes['genre']; ?></td>
                        <td><?php echo $listes['telephone']; ?></td>
                        
                        </tr>
                       
                        <tr>
                            <td><img src="" alt=""></td>
                            <td><?php echo $listes['nom1']; ?></td>
                            <td><?php echo $listes['prenom1']; ?></td>
                            <td><?php echo $listes['email1']; ?>/td>
                            <td><?php echo $listes['genre1']; ?></td>
                            <td><?php echo $listes['telephone1']; ?></td>
                          
                        </tr>
                       
                      
            
                    </table>
                 
                </div>

           

  <h3>Référentiel</h3>

        </div>
        


    </main>
