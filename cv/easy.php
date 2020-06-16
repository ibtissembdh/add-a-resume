<?php

require 'includes/config.inc.php';



$_POST['familyName']  = "ghvghvghvgh";
$_POST['name'] = "adel";
$_POST['phoneNum'] = "hhhhhhhhhhh";
$_POST['email'] = "ibti@gmail.com";
$_POST['jobe'] = "hhhhhhhhhhh";
$_POST['pic'] = "hhhhhhhhhhh";
$_POST['date'] = "hhhhhhhhhhh";

$_POST['diplomaName'] = "hhhh";

$_POST['dp_startDate'] = "hhhhhhhhhhh";

$_POST['dp_endDate'] = "hhhhhhhhhhh";

$_POST['dp_description'] = "hhhhhhhhhhh";

$_POST['experience'] = "hhhhhhhhhhh";

$_POST['ex_startDate'] = "hhhhhhhhhhh";

$_POST['ex_endDate'] = "hhhhhhhhhhh";

$_POST['ex_description'] = "hhhhhhhhhhh";

  
 $_POST['hobbie'] = "hhhhhhhhhhh";
 $_POST['skill'] = "hhhhhhhhhhh";


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
                            echo $id= $this->db->insert_id();

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
