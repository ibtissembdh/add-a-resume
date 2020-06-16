<?php

function insert()
{
    
       global $db;

       
                        $sql=sprintf( "INSERT into user ( `nom`, `prenom`, `tel`, `email`, `titre`, `photo`, `date`) VALUES('%s','%s','%s','%s','%s','%s','%s')",
                        $db->real_escape_string($_POST['familyName']),
                        $db->real_escape_string($_POST['name']),
                        $db->real_escape_string($_POST['phoneNum']),
                        $db->real_escape_string($_POST['email']),
                        $db->real_escape_string($_POST['jobe']),
                        $db->real_escape_string($_POST['pic']),
                        $db->real_escape_string($_POST['date']));

                        if($db->query($sql))
                        {
                            echo $id= $db->insert_id;

                            $sql=sprintf( "INSERT into formation (user_id,intituleF,dp_dateDebut,dp_dateFin,dp_description) VALUES($id,'%s','%s','%s','%s')",
                            $db->real_escape_string($_POST['diplomaName']),
                            $db->real_escape_string($_POST['dp_startDate']),
                            $db->real_escape_string($_POST['dp_endDate']),
                            $db->real_escape_string($_POST['dp_description']));
           
                                        if($db->query($sql))
                                        {
                                                    $sql=sprintf( "INSERT into experience (user_id,intituleE,ex_dateDebut,ex_dateFin,ex_description) VALUES($id,'%s','%s','%s','%s')",
                                                    $db->real_escape_string($_POST['experience']),
                                                    $db->real_escape_string($_POST['ex_startDate']),
                                                    $db->real_escape_string($_POST['ex_endDate']),
                                                    $db->real_escape_string($_POST['ex_description']));
                                        
                                                                if($db->query($sql))
                                                                {
                                                                    $sql=sprintf( "INSERT into competence (user_id,competence) VALUES($id,'%s')",
                                                                    $db->real_escape_string($_POST['skill']));
                                                                   
                                                               
                                                                            if($db->query($sql))
                                                                            {
                                                                               
                                                                                $sql=sprintf( "INSERT into loisir (user_id,loisir) VALUES($id,'%s')",
                                                                                $db->real_escape_string($_POST['hobbie']));
                                                                   
                                                                                        if($db->query($sql))
                                                                                    {
                                                                                        echo "<div class='alert alert-success'> Les informations ont été bien enregistrées </div> ";
                                                                            
                                                                                    }
                                                                    
                                                                            }else{
                                                                                
                                                                                echo "<div class='alert alert-warning'> Les informations competence n'ont pas été bien enregistrées </div> ";
                                                        
                                                                            }
                                                        
                                                                }else{
                                                                    
                                                                    echo "<div class='alert alert-warning'> Les informations experience n'ont pas été bien enregistrées</div> ";
                                            
                                                                }
                                
                                        }else{
                                            
                                            echo "<div class='alert alert-warning'> Les informations formation n'ont pas été bien enregistrées </div> ";
                    
                                        }
   
                           
                
                        }else{
                            
                            echo "<div class='alert alert-warning'> Les informations personnel n'ont pas été bien enregistrées </div> ";
    
                        }

                         
                       


        
}



function display()
{
    global $db;
    $table="<table  class=\"table\">
             <thead class=\"thead-dark\">
                <tr>
                    <th scope=\"col \"> Nom&Prénom </th>
                    <th scope=\"col\"> Titre CV</th>
                    <th scope=\"col\"> Formation</th>
                    <th scope=\"col\"> Expérience</th>
                    <th scope=\"col\"> Action</th>
                </tr>
              </thead>
              <tbody>";


    $sql=sprintf( "SELECT u.nom , u.prenom , u.titre , f.intituleF , e.intituleE , u.id   from  user u ,formation f,experience e where u.id=f.user_id and u.id=e.user_id  ");

            $result=$db->query($sql);

            foreach($result as $row)
            {
                $table .='<tr>
                    <th scope="row">'. htmlspecialchars($row['nom'],ENT_QUOTES) ." ". htmlspecialchars( $row['prenom'],ENT_QUOTES). '</th>
                        <td>'. htmlspecialchars($row['titre'],ENT_QUOTES) .'</td>
                        <td> '. htmlspecialchars($row['intituleF'],ENT_QUOTES) .'</td>
                        <td> '. htmlspecialchars($row['intituleE'],ENT_QUOTES) .'</td>
                        <td> 
                            <button class="btn btn-primary" data-id='. htmlspecialchars($row['id'],ENT_QUOTES) .'  id="btn_edit" data-toggle="modal" data-target="#update" > 
                                 <span class="fas fa-pencil-alt" style="color:white;" > </span> 
                            </button>

                            <button class="btn btn-danger" style="margin-left:5px;" data-id1='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_delete" data-toggle="modal" data-target="#delete"  >
                                  <span class="fas fa-trash-alt" style="color:white;"></span >
                             </button>

                             <button class="btn btn-success" style="margin-left:5px;" data-id2='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_more" data-toggle="modal" data-target=" "  >
                             <a class="fas fa-plus" style="color:white;" href="./resume.php?id='.$row['id'] .'"></a >
                        </button>
                         </td>
                </tr>';   

              };

              $table .='</tbody> </table>';

              echo  $table ;
}




 function get_user_Record()
    {
        global $db;
        
       
            
            $id = $_POST['id'];

                 $sql=sprintf ("SELECT * FROM user u,competence c,loisir l ,formation f,experience e WHERE u.id=$id and c.user_id =$id and  l.user_id=$id and f.user_id =$id and e.user_id =$id  ");

                $result=$db->query($sql);
                
                foreach($result as $row)
                {
                    $data[]="";
                    $data[0] = $row['photo'];
                    $data[1]  =$row['nom'];
                    $data[2]  =$row['prenom'];
                    $data[3]  =$row['titre'];
                    $data[4]  =$row['email'];
                    $data[5]  =$row['tel'];
                    $data[6]  =$row['date'];

                    $data[7]  =$row['intituleF'];
                    $data[8]  =$row['dp_dateDebut'];
                    $data[9]  =$row['dp_dateFin'];
                    $data[10]  =$row['dp_description'];

                    $data[11]  =$row['intituleE'];
                    $data[12]  =$row['ex_dateDebut'];
                    $data[13]  =$row['ex_dateFin'];
                    $data[14]  =$row['ex_description'];

                    $data[15]  =$row['loisir'];
                    $data[16]  =$row['competence'];

                    $data[17] =$id;
                   
                }

               echo json_encode($data);
              
         

         
    }

    

    function  update()
    {

        global $db;
        $id = $_POST['id'] ;

                    $sql=sprintf( "UPDATE user SET nom ='%s',prenom = '%s',tel = '%s',email = '%s',titre = '%s',photo = '%s', date = '%s' WHERE id = $id ",
                    $db->real_escape_string($_POST['familyName']),
                    $db->real_escape_string($_POST['name']),
                    $db->real_escape_string($_POST['phoneNum']),
                    $db->real_escape_string($_POST['email']),
                    $db->real_escape_string($_POST['jobe']),
                    $db->real_escape_string($_POST['pic']),
                    $db->real_escape_string($_POST['date']));

                    if($db->query($sql))
                    {
                        echo "<div class='alert alert-success'> Les informations 1 ont  été modifié </div> ";
            
                    }else{
                        
                        echo "<div class='alert alert-warning'> Les informations 1 n'ont pas  été modifié </div> ";

                    }

      

                     $sql=sprintf( "UPDATE formation  SET  intituleF = '%s' ,dp_dateDebut = '%s' ,dp_dateFin = '%s' ,dp_description = '%s' WHERE user_id = $id ",
                     $db->real_escape_string($_POST['diplomaName']),
                     $db->real_escape_string($_POST['dp_startDate']),
                     $db->real_escape_string($_POST['dp_endDate']),
                     $db->real_escape_string($_POST['dp_description']));
    
                     if($db->query($sql))
                    {
                        echo "<div class='alert alert-success'> Les informations 2 ont  été modifié </div> ";
            
                    }else{
                        
                        echo "<div class='alert alert-warning'> Les informations 2 n'ont pas  été modifié </div> ";

                    }

                     $sql=sprintf( "UPDATE experience  SET intituleE ='%s' ,ex_dateDebut= '%s' ,ex_dateFin= '%s' ,ex_description= '%s'  WHERE user_id = $id ",
                     $db->real_escape_string($_POST['experience']),
                     $db->real_escape_string($_POST['ex_startDate']),
                     $db->real_escape_string($_POST['ex_endDate']),
                     $db->real_escape_string($_POST['ex_description']));
         
                     if($db->query($sql))
                     {
                        echo "<div class='alert alert-success'> Les informations 3 ont  été modifié </div> ";
            
                    }else{
                        
                        echo "<div class='alert alert-warning'> Les informations 3 n'ont pas  été modifié </div> ";

                    }
        
                     $sql=sprintf( "UPDATE loisir  SET loisir='%s' WHERE user_id = $id ",
                     $db->real_escape_string($_POST['hobbie']));
                
                     if($db->query($sql))
                    {

                        echo "<div class='alert alert-success'> Les informations 4 ont  été modifié </div> ";
            
                    }else{
                        
                        echo "<div class='alert alert-warning'> Les informations 4 n'ont pas  été modifié </div> ";

                    }
        
                     $sql=sprintf( "UPDATE competence SET  competence= '%s' WHERE user_id = $id ",
                     $db->real_escape_string($_POST['skill']));
                
                    $result= $db->query($sql);

                    if($result){

                        echo "<div class='alert alert-success'> Les informations 5 ont  été modifié </div> ";
            
                    }else{
                        
                        echo "<div class='alert alert-warning'> Les informations  5 n'ont pas  été modifié </div> ";

                    }


        
    }

    

    function delete()
    {
        global $db;

        $id = $_POST['id'];
        
        $sql="DELETE FROM  user   WHERE user.id=' $id '" ; 
        $query= $db->query($sql);

        if($query)
        {
            echo "<div class='alert alert-success'> Le cv  a  été supprimé </div> ";

        }
        
    }

    

    function search()
    {
        global $db;

        $data=$_POST['data'];

        $table="<table  class=\"table\">
             <thead class=\"thead-dark\">
                <tr>
                    <th scope=\"col \"> Nom&Prénom </th>
                    <th scope=\"col\"> Titre CV</th>
                    <th scope=\"col\"> Formation</th>
                    <th scope=\"col\"> Expérience</th>
                    <th scope=\"col\"> Action</th>
                </tr>
              </thead>
              <tbody>";


    $sql=sprintf( "SELECT* from  user u ,formation f,experience e where  u.id=f.user_id and u.id=e.user_id and  u.titre  LIKE '%".$data."%'  ");

            $result=$db->query($sql);

            foreach($result as $row)
            {
                $table .='<tr>
                    <th scope="row">'. htmlspecialchars($row['nom'],ENT_QUOTES) ." ". htmlspecialchars( $row['prenom'],ENT_QUOTES). '</th>
                        <td>'. htmlspecialchars($row['titre'],ENT_QUOTES) .'</td>
                        <td> '. htmlspecialchars($row['intituleF'],ENT_QUOTES) .'</td>
                        <td> '. htmlspecialchars($row['intituleE'],ENT_QUOTES) .'</td>
                        <td> 
                            <button class="btn btn-primary" data-id='. htmlspecialchars($row['id'],ENT_QUOTES) .'  id="btn_edit" data-toggle="modal" data-target="#update" > 
                                 <span class="fas fa-pencil-alt" style="color:white;" > </span> 
                            </button>

                            <button class="btn btn-danger" style="margin-left:5px;" data-id1='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_delete" data-toggle="modal" data-target="#delete"  >
                                  <span class="fas fa-trash-alt" style="color:white;"></span >
                             </button>

                             <button class="btn btn-success" style="margin-left:5px;" data-id2='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_more" data-toggle="modal" data-target=" "  >
                             <span class="fas fa-plus" style="color:white;"></span >
                        </button>
                         </td>
                </tr>';   

              };

              $table .='</tbody> </table>';

              echo  $table ;
        
    }




    