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
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
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

        <h1 > <center> Liste des curriculum vitæ  </center>  </h1>

        <div id="table"> </div>


        <?php
        require "classes/Form.php";
        require "classes/Field.php";
        require "classes/Modal.php";
        require "classes/section.php";
        

        $modal_registration= new modal("registration" , "Ajouter votre cv ", "btn_close","btn_registration","register Now ");


                        
                        $user[] = new Field('VOTRE PHOTO','file', 'pic' ,'','');
                        $user[] = new Field('VOTRE NOM','text', 'name','','');
                        $user[] = new Field('VOTRE PRÉNOM','text', 'familyName','',''); 
                        $user[] = new Field('VOTRE MÉTIER','text', 'jobe','','');   
                        $user[] = new Field('VOTRE ADRESSE EMAIL','email', 'email','',''); 
                        $user[] = new Field('VOTRE TÉLEPHONE','text', 'phoneNum','',''); 
                        $user[] = new Field('DATE DE NAISSANCE','date', 'date','',''); 
                      

                        $sections[] = new section('INFORMATION PÉRSONNEL' , $user );
                               

                        $diploma[] = new Field('INTITULÉ','text', 'diplomaName' ,'','');
                        $diploma[] = new Field('DATE DE DÉBUT','date', 'dp_startDate','',''); 
                        $diploma[] = new Field('DATE DE FIN','date', 'dp_endDate','',''); 
                        $diploma[] = new Field('DÉSCRIPTION','text', 'dp_description','','');

                        $sections[]= new section('FORMATION' , $diploma );

  
                        $experience[] = new Field('INTITULÉ','text', 'experience' ,'','');
                        $experience[] = new Field('DATE DE DÉBUT','date', 'ex_startDate','',''); 
                        $experience[] = new Field('DATE DE FIN','date', 'ex_endDate','',''); 
                        $experience[] = new Field('DÉSCRIPTION','text', 'ex_description','','');

                        $sections[]= new section('EXPERIENCE' , $experience );


                        $skills[] = new Field('VOTRE COMPETENCE','text', 'skill','',' Entrer competence');
                        $sections[] = new section('COMPETENCE' , $skills );

                        $hobbies[] = new Field('VOTRE LOISIR','text', 'hobbie','','Enter loisir');
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

                        $up_user[] = new Field('VOTRE PHOTO','file', 'up_pic' ,'','');
                        $up_user[] = new Field('VOTRE NOM','text', 'up_name','','');
                        $up_user[] = new Field('VOTRE PRÉNOM','text', 'up_familyName','',''); 
                        $up_user[] = new Field('VOTRE MÉTIER','text', 'up_jobe','','');   
                        $up_user[] = new Field('VOTRE ADRESSE EMAIL','email', 'up_email','',''); 
                        $up_user[] = new Field('VOTRE TÉLEPHONE','text', 'up_phoneNum','',''); 
                        $up_user[] = new Field('DATE DE NAISSANCE','date', 'up_date','',''); 
                        $up_user[] = new Field('','hidden', 'up_id','',''); 

                        $up_sections[] = new section('INFORMATION PÉRSONNEL' , $up_user );
                               

                        $up_diploma[] = new Field('INTITULÉ','text', 'up_diplomaName' ,'','');
                        $up_diploma[] = new Field('DATE DE DÉBUT','date', 'up_dp_startDate','',''); 
                        $up_diploma[] = new Field('DATE DE FIN','date', 'up_dp_endDate','',''); 
                        $up_diploma[] = new Field('DÉSCRIPTION','text', 'up_dp_description','','');

                        $up_sections[]= new section('FORMATION' , $up_diploma );

  
                        $up_experience[] = new Field('INTITULÉ','text', 'up_experience' ,'','');
                        $up_experience[] = new Field('DATE DE DÉBUT','date', 'up_ex_startDate','',''); 
                        $up_experience[] = new Field('DATE DE FIN','date', 'up_ex_endDate','',''); 
                        $up_experience[] = new Field('DÉSCRIPTION','text', 'up_ex_description','','');

                        $up_sections[]= new section('EXPERIENCE' , $up_experience );


                        $up_skills[] = new Field('VOTRE COMPETENCE','text', 'up_skill','',' Entrer competence');
                        $up_sections[] = new section('COMPETENCE' , $up_skills );

                        $up_hobbies[] = new Field('VOTRE LOISIR','text', 'up_hobbie','','Enter loisir');
                        $up_sections[] = new section('LOISIR' , $up_hobbies );              


                        $up_form = new Form('POST','Form', $up_sections);


//view              

                echo $modal_update->getTagModal();

                echo $modal_update->getTagBodyModal();

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