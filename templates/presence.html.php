
  
  
    
    <main>
       
        <div class="contenu" style="height: 44em;">
            <div class="entete" style="display:flex;">
                <div class="select1">
                    <select name="" id="">
                        <option value="status">status</option>
                        <option value="">apprennant</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="select2">
                    <select name="" id="">
                        <option value="status">Referentiel</option>
                        <option value="">apprennant</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="datecl">
                    <input type="date" >
                    
                </div>
                <div class="boutons">
                    <a href="">Rechercher</a>
                </div>
            </div>
          
             
        
                         
                
                <div class="tableau" style="margin-left: 8em;">
                    <table class="table" style="line-height: 1em;">
                    <?php  include"../models/presence.php"?>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Referentiel</th>
                            <th>heure d'arrivé</th>
                            <th>status</th>
                        </tr>
                        <tr>
                            <td><?php echo $presence['Matricule']?></td>
                            <td><?php echo $presence['nom']?></td>
                            <td><?php echo $presence['prenom']?></td>
                            <td><?php echo $presence['telephone']?></td>
                            <td> <?php echo $presence['referentiel']?></td>
                            <td><span style="color: green;"><?php echo $presence['heure_arrive']?></span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;"><?php echo $presence['status']?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $presence['Matricule1']?></td>
                            <td><?php echo $presence['nom1']?></td>
                            <td><?php echo $presence['prenom1']?></td>
                            <td><?php echo $presence['telephone1']?></td>
                            <td><?php echo $presence['referentiel1']?></td>
                            <td><span style="color: green;"><?php echo $presence['heure_arrive1']?></span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;"><?php echo $presence['status1']?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $presence['Matricule2']?></td>
                            <td><?php echo $presence['nom2']?></td>
                            <td><?php echo $presence['prenom2']?>2</td>
                            <td><?php echo $presence['telephone2']?></td>
                            <td><?php echo $presence['referentiel2']?> </td>
                            <td><span style="color: green;"><?php echo $presence['heure_arrive2']?></span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;"><?php echo $presence['status2']?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $presence['Matricule3']?></td>
                            <td><?php echo $presence['nom3']?></td>
                            <td><?php echo $presence['prenom3']?></td>
                            <td><?php echo $presence['telephone3']?></td>
                            <td> <?php echo $presence['referentiel3']?></td>
                            <td><span style="color: green;"><?php echo $presence['heure_arrive']?></span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;"><?php echo $presence['status3']?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $presence['Matricule4']?></td>
                            <td><?php echo $presence['nom4']?></td>
                            <td><?php echo $presence['prenom4']?></td>
                            <td><?php echo $presence['telephone4']?></td>
                            <td> <?php echo $presence['referentiel4']?></td>
                            <td><span style="color: green;"><?php echo $presence['heure_arrive4']?></span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;"><?php echo $presence['status4']?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $presence['Matricule5']?></td>
                            <td><?php echo $presence['nom5']?></td>
                            <td><?php echo $presence['prenom5']?></td>
                            <td><?php echo $presence['telephone5']?></td>
                            <td><?php echo $presence['referentiel5']?></td>
                            <td><span style="color: green;"><?php echo $presence['heure_arrive5']?></span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;"><?php echo $presence['status5']?></span></td>
                        </tr>
                        <tr>
                            <td><?php echo $presence['Matricule6']?></td>
                            <td><?php echo $presence['nom6']?></td>
                            <td><?php echo $presence['prenom6']?></td>
                            <td><?php echo $presence['telephone6']?></td>
                            <td> <?php echo $presence['referentiel6']?></td>
                            <td><span style="color: green;"><?php echo $presence['heure_arrive6']?></span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;"><?php echo $presence['status6']?></span></td>
                        </tr>
                        <tr>
                            <td>P6_DEVDAT_2624_129</td>
                            <td>seck</td>
                            <td>Rama</td>
                            <td>753242132</td>
                            <td>developpement Data</td>
                            <td><span style="color: green;">06:49</span></td>
                            <td><span style="background: rgb(231, 230, 230); color: green;padding: 10px;">PRESENT</span></td>
                        </tr>
                      
                      
                      
                         
                          
                      
                    
                    </table>
                    <div style="position: relative; top: -2em; display: flex; gap: 1em; left: 95em;"><p>< </p><p><a href="present.html" style="text-decoration: none; color: black;"> ></a> </p>               
                           
                      
        </div>
                   
                   
                   
                </div>
                    
                <div class="footer" style="background-color: white; margin-top: -3em; display:flex; justify-content: center;">
                    <p style="text-align: center;">copy</p>
                    <p class="foot"><img src="classe.jpg" alt="" width="90px" height="50px" style="position: relative; left: 52em;"></p>

                </div>

           


        </div>
  


    </main>

