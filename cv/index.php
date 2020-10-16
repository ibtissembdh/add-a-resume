<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/style.css">
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>       
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <script src="https://kit.fontawesome.com/9cfe163ae0.js" crossorigin="anonymous"></script>
        <script src="js/script.js"></script>
        
        <title>Document</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
                <a class="navbar-brand"> 
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registration">
                                   Ajouter un curriculum vitæ
                        </button>
                </a>
                <form class="form-inline">

                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
                        
                </form>
        </nav>

        <h1 > <center> Liste des curriculum  </center>  </h1>

        <div id="table"> </div>


        <?php
        require "classes/Form.php";
        require "classes/Field.php";
        require "classes/Modal.php";
        require "classes/section.php";
        

        $modal_registration= new modal("registration" , "Ajouter votre cv ", "btn_close","btn_registration","register Now ");


                        
                        $user[] = new Field('VOTRE PHOTO','file', 'pic' , 'pic' ,'','');
                        $user[] = new Field('VOTRE NOM','text', 'name', 'name' ,'','');
                        $user[] = new Field('VOTRE PRÉNOM','text', 'familyName', 'familyName' ,'',''); 
                        $user[] = new Field('VOTRE MÉTIER','text', 'jobe', 'jobe' ,'','');   
                        $user[] = new Field('VOTRE ADRESSE EMAIL','email', 'email', 'email' ,'',''); 
                        $user[] = new Field('VOTRE TÉLEPHONE','text', 'phoneNum', 'phoneNum' ,'',''); 
                        $user[] = new Field('DATE DE NAISSANCE','date', 'date', 'date' ,'',''); 
                      

                        $sections[] = new section('INFORMATION PÉRSONNEL' , $user );
                               

                        $diploma[] = new Field('INTITULÉ','text', 'diplomaName[]' , 'diplomaName' ,'','');
                        $diploma[] = new Field('DATE DE DÉBUT','date', 'dp_startDate[]', 'dp_startDate','',' '); 
                        $diploma[] = new Field('DATE DE FIN','date', 'dp_endDate[]', 'dp_endDate' ,'',''); 
                        $diploma[] = new Field('DÉSCRIPTION','text', 'dp_description[]', 'dp_description' ,'','');

                        $sections[]= new section('FORMATION' , $diploma );

  
                        $experience[] = new Field('INTITULÉ','text', 'experience[]' , 'experience' ,'','');
                        $experience[] = new Field('DATE DE DÉBUT','date', 'ex_startDate[]', 'ex_startDate' ,'',''); 
                        $experience[] = new Field('DATE DE FIN','date', 'ex_endDate[]', 'ex_endDate' ,'',''); 
                        $experience[] = new Field('DÉSCRIPTION','text', 'ex_description[]', 'ex_description' ,'','');

                        $sections[]= new section('EXPERIENCE' , $experience );


                        $skills[] = new Field('VOTRE COMPETENCE','text', 'skill[]', 'skill' ,'','Entrer competence');
                        $sections['COMPETENCE'] = new section('COMPETENCE' , $skills );

                        $hobbies[] = new Field('VOTRE LOISIR','text', 'hobbie[]', 'hobbie' ,'','Enter loisir');
                        $sections[] = new section('LOISIR' , $hobbies );              


                        $form = new Form('POST','Form', $sections);

                        
                      
        //view              

        echo $modal_registration->getTagModal();

                echo $modal_registration->getTagBodyModal();
                
                        echo $form->getStartTag() . PHP_EOL;
                                
                                foreach($form->getSections() as $section )
                                {
                                       echo  $section ->getStartTag();

                                                
                                                foreach($section->getFields() as $field)
                                                {
                                                
                                                        echo  $field->getTag() . PHP_EOL;

                                                       
                                                }
                                                        

                                        echo  $section->getEndTag();


                                }  
                                                 
                        echo $form->getEndTag();

                echo $modal_registration->EndTagBodyModel();
        echo $modal_registration->getFooterModal();
        
        
        /* ----------------------------------------------------------------------------------------------------------------------- */

        $modal_update= new modal("update" , "modifier votre cv ", "btn_close","btn_update","update Now ");

                         
         //view 

                echo $modal_update->getTagModal();

                echo $modal_update->getTagBodyModal();

                        
                        // We'll Get Modal content from get_Record script function
                    ?> 

                        <div id="modal_content"> </div>

                    <?php

                echo $modal_update->EndTagBodyModel();
                echo $modal_update->getFooterModal();


                 /* ----------------------------------------------------------------------------------------------------------------------- */

         $modal_delete= new modal("delete" , "supprimer votre cv ", "btn_close","btn_delete_record","delete Now ");

      


//view              

                echo $modal_delete->getTagModal();
                echo $modal_delete->getTagBodyModal();

                echo $modal_delete->EndTagBodyModel();
                echo $modal_delete->getFooterModal();
                                        


        ?>


    
</body>
</html>