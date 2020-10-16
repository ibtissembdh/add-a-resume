<?php

function insert()
{
    
       global $db;
     
         $familyName = $_POST['familyName'];
         $name = $_POST['name'] ;
         $phoneNum = $_POST['phoneNum'];
         $email = $_POST['email'];
         $jobe = $_POST['jobe'];
         $pic = $_POST['pic'];
         $date = $_POST['date'];

         $data_user = json_decode(stripslashes($_POST['data_user']));      
                      
        // echo '<pre>'; 
        // print_r($data_user);

                    //insert personnel user data 

                    $sql=sprintf( "INSERT into user ( `nom`, `prenom`, `tel`, `email`, `titre`, `photo`, `date`) VALUES('%s','%s','%s','%s','%s','%s','%s')",
                        $db->real_escape_string($familyName),
                        $db->real_escape_string($name),
                        $db->real_escape_string($phoneNum),
                        $db->real_escape_string($email),
                        $db->real_escape_string( $jobe), 
                        $db->real_escape_string($pic),
                        $db->real_escape_string($date));

                        if($db->query($sql))
                        {
                            $id= $db->insert_id;
                        

                        }else{

                            echo "<div class='alert alert-warning'> Les informations formation n'ont pas été bien enregistrées </div> ";
                             $data_user_error = true ;
                        }

                       

                     if (isset($data_user) and isset($id))
                     {
                                // diploma data         
                                 $diplomaName = $data_user->diplomaName->diplomaName;
                                 $dp_startDate = $data_user->dp_startDate->dp_startDate;
                                 $dp_endDate = $data_user->dp_endDate->dp_endDate;
                                 $dp_description = $data_user->dp_description->dp_description;

                                 //experience data
                                 $experience = $data_user->experience->experience;
                                 $ex_startDate = $data_user->ex_startDate->ex_startDate;
                                 $ex_endDate = $data_user->ex_endDate->ex_endDate;
                                 $ex_description = $data_user->ex_description->ex_description;

                                //skills data
                                 $skill = $data_user->skill->skill;

                                 //hobbies data
                                 $hobbie = $data_user->hobbie->hobbie;

                                 $data_user_error = "" ;

                                 //insert diploma data
                                 if( !empty($diplomaName)  AND $dp_startDate !='' AND $dp_endDate !='' AND  $dp_description !='' )
                                {
                                     foreach($diplomaName as $key => $value)
                                     {
                                         
                                         $sql=sprintf( "INSERT into formation (user_id,intituleF,dp_dateDebut,dp_dateFin,dp_description) VALUES( $id ,'%s','%s','%s','%s')",
                                             $db->real_escape_string($value),
                                             $db->real_escape_string($dp_startDate[$key]),
                                             $db->real_escape_string($dp_endDate[$key]),
                                             $db->real_escape_string($dp_description[$key]));

                                             if($db->query($sql))
                                             {
                                                 $data_user_error = false;


                                             }else{

                                                 $data_user_error = true ;
                                                 echo "<div class='alert alert-warning'> Les informations formation n'ont pas été bien enregistrées</div> ";
                                            }


                                     }
                                

                                }

                                //insert experience data
                                if( $experience  != "" AND $ex_startDate != "" AND $ex_endDate != "" AND $ex_description != "")
                                {
                                     foreach($experience as $key =>$value )
                                     {
                                        
                                        $sql=sprintf( "INSERT into experience (user_id,intituleE,ex_dateDebut,ex_dateFin,ex_description) VALUES($id,'%s','%s','%s','%s')",
                                                 $db->real_escape_string($value),
                                                 $db->real_escape_string($ex_startDate[$key]),
                                                 $db->real_escape_string($ex_endDate[$key]),
                                                 $db->real_escape_string($ex_description[$key]));

                                                 if($db->query($sql))
                                                 {
                                                     $data_user_error = false ;

                                                 }else{

                                                    $data_user_error = true ;
                                                    echo "<div class='alert alert-warning'> Les informations experience n'ont pas été bien enregistrées</div> ";
                                                       
                                                }


                                       }                      
                                    
                                     
                                }

                                //insert skills data
                                if( $skill !="")
                                {
                                     foreach($skill as $key =>$value)
                                     {
                                         
                                         $sql=sprintf( "INSERT into competence (user_id,competence) VALUES($id,'%s')",
                                                  $db->real_escape_string($value));

                                                  if($db->query($sql))
                                                  {
                                                     $data_user_error = false ;

                                                  }else{

                                                        $data_user_error = true ;
                                                        echo "<div class='alert alert-warning'> Les informations loisir n'ont pas été bien enregistrées</div> ";
          
                                                    }


                                         }

                                
                       
                                 }

                                //insert hobbies data
                                if( $hobbie !="")
                                {
                                     foreach($hobbie as $key =>$value)
                                     {
                                        
                                         $sql=sprintf( "INSERT into loisir (user_id,loisir) VALUES($id,'%s')",
                                                  $db->real_escape_string($value));
                                            
                                         if($db->query($sql))
                                         {

                                             $data_user_error = false ;

                                          }else{

                                            $data_user_error = true ;
                                            echo "<div class='alert alert-warning'> Les informations competence n'ont pas été bien enregistrées</div> ";
                                            
                                             
                                                 }

                                                             
                                
                                        }
                                 
                         
                              }

                    }



                 if($data_user_error == false)
                 {
                    echo "<div class='alert alert-success'> Les informations ont été bien enregistrées </div> ";
                    
                 }    

        
}




function display()
{
    global $db;

         $sql=" SELECT u.nom , u.prenom , u.titre ,  u.id , GROUP_CONCAT( DISTINCT f.intituleF) diplomaNames , GROUP_CONCAT( DISTINCT  e.intituleE) ExperienceNames  FROM  user u  LEFT JOIN formation f ON f.user_id= u.id  LEFT JOIN experience e ON  e.user_id=u.id GROUP BY  u.id ORDER BY  u.nom ASC  ";

         $result=$db->query($sql); 

        if($result)
        {
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


   

          

            foreach($result as $row)
            {
               // echo "<pre>";
               // print_r($row);
                 
                  $table .='<tr>
                    <th scope="row">'. htmlspecialchars($row['nom'],ENT_QUOTES) ." ". htmlspecialchars( $row['prenom'],ENT_QUOTES). '</th>
                        <td>'. htmlspecialchars($row['titre'],ENT_QUOTES) .'</td>
                        <td> '. htmlspecialchars($row['diplomaNames'],ENT_QUOTES) .'</td>
                        <td> '. htmlspecialchars($row['ExperienceNames'],ENT_QUOTES) .'</td>
                        <td> 
                            <button class="btn btn-primary" data-id='. htmlspecialchars($row['id'],ENT_QUOTES) .'  id="btn_edit" data-toggle="modal" data-target="#update" > 
                                 <span class="fas fa-pencil-alt" style="color:white;" > </span> 
                            </button>

                            <button class="btn btn-danger" style="margin-left:5px;" data-id1='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_delete" data-toggle="modal" data-target="#delete"  >
                                  <span class="fas fa-trash-alt" style="color:white;"></span >
                             </button>

                             <button class="btn btn-success" style="margin-left:5px;" data-id='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_more" >
                                  <a class="fas fa-plus" style="color:white;" href="./resume.php?id='.$row['id'] .'"></a>
                            </button>
                         </td>
                </tr>';  
               
            

            }
                         

              $table .='</tbody> </table>';

            
           
        }else{

            echo " CHECK YOUR QUERY" ;
        }

          

              echo  $table ;


    
   

              
}



function get_user_Record()
{
           

             global $db;

                require "./classes/Form.php";
                require "./classes/Field.php";
                require "./classes/Modal.php";
                require "./classes/section.php";

          
                    $id = $_POST['id'];

                    

                    // create inputs
                   

                    $sql="SELECT * FROM  user u  where u.id = $id ";  $response_user =$db->query($sql); 

                   if(isset($response_user)){ foreach ($response_user as $row) {
                         
                                       
                                        $up_user[] = new Field('VOTRE PHOTO','file', 'up_pic' , 'up_pic',$row['photo'],'');
                                        $up_user[] = new Field('VOTRE NOM','text', 'up_name', 'up_name',$row['nom'],'');
                                        $up_user[] = new Field('VOTRE PRÉNOM','text', 'up_familyName', 'up_familyName',$row['prenom'],''); 
                                        $up_user[] = new Field('VOTRE MÉTIER','text', 'up_jobe', 'up_jobe',$row['titre'],'');   
                                        $up_user[] = new Field('VOTRE ADRESSE EMAIL','email', 'up_email', 'up_email',$row['email'],''); 
                                        $up_user[] = new Field('VOTRE TÉLEPHONE','text', 'up_phoneNum', 'up_phoneNum',$row['tel'],''); 
                                        $up_user[] = new Field('DATE DE NAISSANCE','date', 'up_date', 'up_date',$row['date'],''); 
                                        $up_user[] = new Field('','hidden', 'up_id','up_id',$row['id'],''); 
                                       
                                        


                                    }};


                    $sql="SELECT * FROM  formation f  where  f.user_id = $id ";  $response_diploma =$db->query($sql);                            

                   if(isset($response_diploma)){ foreach ($response_diploma as $row) {                          
                    
                                        $up_diploma[] = new Field('INTITULÉ','text', 'up_diplomaName[]' , 'up_diplomaName',$row['intituleF'],'');
                                        $up_diploma[] = new Field('DATE DE DÉBUT','date', 'up_dp_startDate[]', 'up_dp_startDate',$row['dp_dateDebut'],''); 
                                        $up_diploma[] = new Field('DATE DE FIN','date', 'up_dp_endDate[]', 'up_dp_endDate',$row['dp_dateFin'],''); 
                                        $up_diploma[] = new Field('DÉSCRIPTION','text', 'up_dp_description[]', 'up_dp_description ',$row['dp_description'],'');

                                        

                                    }};



                    $sql="SELECT * FROM   experience e where e.user_id = $id ";  $response_experience =$db->query($sql); 

                   if(isset($response_experience)){ foreach ($response_experience as $row) {
                 
                                        $up_experience[] = new Field('INTITULÉ','text', 'up_experience[]' , 'up_experience',$row['intituleE'],'');
                                        $up_experience[] = new Field('DATE DE DÉBUT','date', 'up_ex_startDate[]', 'up_ex_startDate',$row['ex_dateDebut'],''); 
                                        $up_experience[] = new Field('DATE DE FIN','date', 'up_ex_endDate[]', 'up_ex_endDate',$row['ex_dateFin'],''); 
                                        $up_experience[] = new Field('DÉSCRIPTION','text', 'up_ex_description[]', 'up_ex_description',$row['ex_description'],'');

                                       

                                    }};



                    $sql="SELECT * FROM   competence c  where  c.user_id = $id "; $response_skills =$db->query($sql); 

                    if(isset($response_skills)){ foreach ($response_skills as $row) {

                                        $up_skills[] = new Field('VOTRE COMPETENCE','text', 'up_skill[]', 'up_skill',$row['competence'],'Entrer competence');
                                        

                                     }};


                    $sql="SELECT * FROM   loisir l  where l.user_id = $id ";  $response_hobbies =$db->query($sql); 

                    if(isset($response_hobbies)){ foreach ($response_hobbies as $row) {                    

                                        $up_hobbies[] = new Field('VOTRE LOISIR','text', 'up_hobbie[]', 'up_hobbie',$row['loisir'],'Entrer loisir');
                                        
                                    }};


                                    // put inputs in sections
                                    if(isset($up_user)){ $up_sections[] = new section('INFORMATION PÉRSONNEL' , $up_user ); } 
                                     if(isset($up_diploma)){$up_sections[]= new section('MODIFIER FORMATION' , $up_diploma ); }
                                    if(isset($up_experience)){$up_sections[]= new section('MODIFIER EXPERIENCE' , $up_experience ); }
                                    if(isset($up_skills)){ $up_sections[] = new section('MODIFIER COMPETENCE' , $up_skills ); } 
                                    if(isset($up_hobbies)){$up_sections[] = new section('MODIFIER LOISIR' , $up_hobbies );  }               




                           //display inputs 

                                        $up_form = new Form('POST','Form', $up_sections); 


                                        
                                         echo $up_form->getStartTag() . PHP_EOL;
                               
                                               foreach($up_form->getSections() as $up_section )
                                               {
                                                   echo  $up_section ->getStartTag();

                                                                   foreach($up_section->getFields() as $up_field)
                                                                   {
                                                                   
                                                                           echo  $up_field->getTag() . PHP_EOL;
                                                                   
                                                                   }
                                                     echo  $up_section->getEndTag();


                                               }                   
                                                       
                                       echo $up_form->getEndTag();

                                      
                           
                       
                                 
            
}
    
function  update()
{

    global $db;

    //user id    
    $id = $_POST['id'] ;


     $familyName = $_POST['familyName'];
     $name = $_POST['name'] ;
     $phoneNum = $_POST['phoneNum'];
     $email = $_POST['email'];
     $jobe = $_POST['jobe'];
     $pic = $_POST['pic'];
     $date = $_POST['date'];

     $data_user = json_decode(stripslashes($_POST['data_user']));      
                  

                //update personnel user data 

                $sql_user=sprintf( "UPDATE user SET nom ='try',prenom ='%s',tel ='%s',email = '%s',titre = '%s', photo = '%s', date = '%s' WHERE user.id= $id ",
                   // $db->real_escape_string($familyName),
                    $db->real_escape_string($name),
                    $db->real_escape_string($phoneNum),
                    $db->real_escape_string($email),
                    $db->real_escape_string( $jobe), 
                    $db->real_escape_string($pic),
                    $db->real_escape_string($date));

                    if($db->query($sql_user))
                    {
                         //Do nothing
                         
                    

                    }else{

                        echo "<div class='alert alert-warning'> Les informations formation n'ont pas été bien modifiées </div> ";
                         $data_user_error = true ;
                    }

                   

                 if (isset($data_user) and isset($id))
                 {
                            // diploma data         
                             $diplomaName = $data_user->diplomaName->diplomaName;
                             $dp_startDate = $data_user->dp_startDate->dp_startDate;
                             $dp_endDate = $data_user->dp_endDate->dp_endDate;
                             $dp_description = $data_user->dp_description->dp_description;

                             //experience data
                             $experience = $data_user->experience->experience;
                             $ex_startDate = $data_user->ex_startDate->ex_startDate;
                             $ex_endDate = $data_user->ex_endDate->ex_endDate;
                             $ex_description = $data_user->ex_description->ex_description;

                            //skills data
                             $skill = $data_user->skill->skill;

                             //hobbies data
                             $hobbie = $data_user->hobbie->hobbie;

                             $data_user_error = "";

                             //update  diploma data
                             if( !empty($diplomaName)  AND $dp_startDate !='' AND $dp_endDate !='' AND  $dp_description !='' )
                            {
                                 foreach($diplomaName as $key => $value)
                                 {
                                     
                                     $sql=sprintf( "UPDATE formation f SET  intituleF = '%s' ,dp_dateDebut = '%s' ,dp_dateFin = '%s' ,dp_description = '%s' WHERE f.user_id = $id",
                                         $db->real_escape_string($value),
                                         $db->real_escape_string($dp_startDate[$key]),
                                         $db->real_escape_string($dp_endDate[$key]),
                                         $db->real_escape_string($dp_description[$key]));

                                         if($db->query($sql))
                                         {
                                            // DO Nothing
                                            $data_user_error = false ;


                                         }else{

                                             $data_user_error = true ;
                                             echo "<div class='alert alert-warning'> Les informations formation n'ont pas été bien modifiées</div> ";
                                         }


                                 }
                            

                            }


                            //update experience data
                            if( $experience  != "" AND $ex_startDate != "" AND $ex_endDate != "" AND $ex_description != "")
                            {
                                 foreach($experience as $key =>$value )
                                 {
                                    
                                    $sql=sprintf( "UPDATE experience  SET intituleE ='%s' ,ex_dateDebut= '%s' ,ex_dateFin= '%s' ,ex_description= '%s'  WHERE user_id = $id ",
                                             $db->real_escape_string($value),
                                             $db->real_escape_string($ex_startDate[$key]),
                                             $db->real_escape_string($ex_endDate[$key]),
                                             $db->real_escape_string($ex_description[$key]));

                                             if($db->query($sql))
                                             {
                                                //DO Nothing
                                                

                                             }else{

                                                $data_user_error = true ;
                                                echo "<div class='alert alert-warning'> Les informations experience n'ont pas été modifiées</div> ";
                                                   
                                            }


                                 }                      
                                
                                 
                            }

                            //update skills data
                            if( $skill !="")
                            {
                                 foreach($skill as $key =>$value)
                                 {
                                     
                                     $sql=sprintf( "UPDATE competence SET  competence= '%s' WHERE user_id = $id ",
                                              $db->real_escape_string($value));

                                              if($db->query($sql))
                                              {
                                                 //DO Nothing 
                                              

                                              }else{

                                                $data_user_error = true ;
                                                echo "<div class='alert alert-warning'> Les informations loisir n'ont pas été modifiées</div> ";

                                                
                                            }

                                 }
                            
                   
                            }

                            //update hobbies data
                            if( $hobbie !="")
                            {
                                 foreach($hobbie as $key =>$value)
                                 {
                                    
                                     $sql=sprintf( "UPDATE loisir  SET loisir='%s' WHERE user_id = $id ",
                                              $db->real_escape_string($value));
                                        
                                      if($db->query($sql))
                                      {
                                         //DO Nothing
                                         
                                      }else{

                                            $data_user_error = true ;
                                            echo "<div class='alert alert-warning'> Les informations competence n'ont pas été bien modifiées</div> ";
                                            
                                             
                                        }

                                 }
                            
                            
                            }
                             
                     
             }

            //success message 
             if($data_user_error == false)
             {
                echo "<div class='alert alert-success'> Les informations ont été bien modifiées </div> ";
                
             }    

    
}
   

    function delete()
    {
        global $db;

         $id = $_POST['id'];
        
         $sql="DELETE FROM  user   WHERE user.id='$id'" ; 
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


     $sql =" SELECT * FROM user, formation , experience  WHERE ( user.nom LIKE '%".$data."%' OR user.prenom LIKE '%".$data."%' OR user.titre LIKE '%".$data."%' OR formation.intituleF LIKE '%".$data."%' OR experience.intituleE LIKE '%".$data."%' ) and user.id=formation.user_id and user.id=experience.user_id  " ;

            $result=$db->query($sql);

            if(mysqli_num_rows($result)>0)
            {
                

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

                                 <button class="btn btn-success" style="margin-left:5px;" data-id='. htmlspecialchars($row['id'],ENT_QUOTES) .' id="btn_more"   >
                                        <a class="fas fa-plus" style="color:white;" href="./resume.php?id='.$row['id'] .'"></a>
                                 </button>
                                </td>
                        </tr>';   

                    };

                    $table .='</tbody> </table>';
            }
              echo  $table ;
        
    }




    