
$(document).ready(function(){

     insert_Record();
     view_Record();
     get_Record();
     update_record();
     delete_record();
     search_record(); 
     addSection();
     removeSection();
     


});


function insert_Record()
{

    $(document).on('click','#btn_registration',function(){
        
         var   pic= $('#pic').val();
         var   name = $('#name').val();
         var   familyName = $('#familyName').val();
         var   jobe= $('#jobe').val();
         var   email = $('#email').val();
         var   phoneNum = $('#phoneNum').val();
         var   date = $('#date').val();


         var diplomaName = $("input[name='diplomaName[]']").map(function(){return $(this).val();}).get();
         var dp_startDate = $("input[name='dp_startDate[]']").map(function(){return $(this).val();}).get();
         var dp_endDate = $("input[name='dp_endDate[]']").map(function(){return $(this).val();}).get();
         var dp_description = $("input[name='dp_description[]']").map(function(){return $(this).val();}).get();

       
         var experience = $("input[name='experience[]']").map(function(){return $(this).val();}).get();
         var ex_startDate = $("input[name='ex_startDate[]']").map(function(){return $(this).val();}).get();
         var ex_endDate = $("input[name='ex_endDate[]']").map(function(){return $(this).val();}).get();
         var ex_description = $("input[name='ex_description[]']").map(function(){return $(this).val();}).get();
        
         var   skill = $("input[name='skill[]']").map(function(){return $(this).val();}).get();
        
         var  hobbie = $("input[name='hobbie[]']").map(function(){return $(this).val();}).get();

         var myObject = {diplomaName :{diplomaName } , dp_startDate :{dp_startDate } , dp_endDate :{dp_endDate } , dp_description :{ dp_description} , experience :{ experience} , ex_startDate :{ ex_startDate} , ex_endDate :{ex_endDate }, ex_description :{ex_description} ,skill :{skill } ,hobbie :{hobbie} };
    

         var data_user = JSON.stringify(myObject);
        
         //console.log(myObject);

         //console.log(myObject['diplomaName']['diplomaName'][0]);


            if( name=="" || familyName=="" || jobe=="" || email=="" || phoneNum=="" || date=="" || diplomaName=="" || dp_startDate ==" " || dp_endDate =="" || dp_description==" " || experience == "" || ex_startDate == "" || ex_endDate==""  || ex_description == " " || hobbie == "" || skill =="" )
          {

                $('#message-registration').html("<div class='alert alert-warning'> veuilllez remplir tous les champs svp </div> ");
                
                

          }else{

                
                 $.ajax(
                    {
                         url: 'insert.php',
                         method:'POST',
                         data:{ pic:pic , name:name , familyName: familyName , jobe:jobe , email:email , phoneNum :phoneNum, date:date , data_user:data_user },
                         success: function(response)
                         {
                            
                              $('#message-registration').html(response);
                              $('#registration').modal('show');
                              $('form').trigger('reset');

                        }

                   });   



     }
            
        
    });
 

    $(document).on('click','#btn_close',function(){
        $('form').trigger('reset');
        $('#message-registration').html('');
         view_Record();
    });


}






function view_Record(){

    $.ajax(
        {
            url : ' view.php ',
            method : 'POST',
            success : function(data){

                    if(data){

                        $('#table').html(data);
                    }else{

                        $('#table').html('no cv est ajouté');
                    }

                }
            

        });

}



function get_Record()
{

    $(document).on('click','#btn_edit',function(){
        
        var   id= $(this).attr('data-id');
    
                
                $.ajax(
                    {
                        url: 'get_record.php',
                        method:'POST',
                        data:{ id:id },
                        dataType: 'JSON',

                        success: function(data){

                             $('#up_pic').val( data[0]);
                             $('#up_name').val( data[1]);
                             $('#up_familyName').val( data[2]);
                             $('#up_jobe').val( data[3]);
                             $('#up_email').val( data[4]);
                             $('#up_phoneNum').val( data[5]);
                             $('#up_date').val( data[6]);

                             $('#up_diplomaName').val( data[7]);
                             $('#up_dp_startDate').val( data[8]);
                             $('#up_dp_endDate').val( data[9]);
                             $('#up_dp_description').val( data[10]);

                             $('#up_experience').val( data[11]);
                            $('#up_ex_startDate').val( data[12]);
                             $('#up_ex_endDate').val( data[13]);
                             $('#up_ex_description').val( data[14]);
                            
                             $('#up_skill').val( data[15]);
                             $('#up_hobbie').val( data[16]);

                             $('#up_id').val( data[17]); 
                            
                            $('#update').modal('show');
                            
                            
                        }

                    });  

            
        
    });
}



    function update_record()
    {
        $(document).on('click','#btn_update', function()
        {
        var   pic= $('#up_pic').val();
        var   name = $('#up_name').val();
        var   familyName = $('#up_familyName').val();
        var   jobe= $('#up_jobe').val();
        var   email = $('#up_email').val();
        var   phoneNum = $('#up_phoneNum').val();
        var   date = $('#up_date').val();

        var   diplomaName = $('#up_diplomaName').val();
        var   dp_startDate = $('#up_dp_startDate').val();
        var   dp_endDate = $('#up_dp_endDate').val();
        var   dp_description = $('#up_dp_description').val();

        var   experience = $('#up_experience').val();
        var   ex_startDate = $('#up_ex_startDate').val();
        var   ex_endDate = $('#up_ex_endDate').val();
        var   ex_description = $('#up_ex_description').val();
        
        var   skill = $('#up_skill').val();
        var   hobbie = $('#up_hobbie').val();
        var   id = $('#up_id').val();

        

            if( name=="" || familyName=="" || jobe=="" || email=="" || phoneNum=="" || date=="" || diplomaName=="" || dp_startDate ==" " || dp_endDate =="" || dp_description==" " || experience == "" || ex_startDate == "" || ex_endDate==""  || ex_description == " " || hobbie == "" || skill =="" ){

                $('#message-update').html("<div class='alert alert-warning'> veuilllez remplir tous les champs svp </div> ");
                $('#update').modal('show');
                

            }else{

                
                $.ajax(
                    {
                        url: 'update.php',
                        method:'POST',
                        data:{ id:id , pic:pic , name:name , familyName: familyName , jobe:jobe , email:email , phoneNum :phoneNum,date:date , diplomaName : diplomaName ,  dp_startDate :dp_startDate ,   dp_endDate : dp_endDate , dp_description:dp_description , experience:experience ,  ex_startDate : ex_startDate , ex_endDate:ex_endDate , ex_description:ex_description,  hobbie: hobbie , skill:skill },
                        success: function(data){

                            $('#message-update').html(data);
                            $('#update').modal('show');
                            $('form').trigger('reset');
                            view_Record();

                            
                            
                        }

                    });  

        }
        });


        $(document).on('click','#btn_close',function(){
            $('form').trigger('reset');
            $('#message-update').html('');
    
        });
    }

    function delete_record()
    {
        $(document).on('click','#btn_delete',function(){

            var  id = $(this).attr('data-id1'); 

            $('#message-delete').html("voulez vous vraiment supprimer ce CV ? </br> si oui cliquez sur le bouton delete Now");   

           // $('#delete').modal('show');          
    
        

        
            $(document).on('click','#btn_delete_record', function()
            {
                
                
                $.ajax(
                    {
                        url : 'delete.php',
                        method : 'POST',
                        data : { id : id },
                        success : function(data)
                        {
                            $('#message-delete').html(data);
                            $('#delete').modal('show');
                            view_Record();
                            alert(data);
                        }
                    });

            });

        });


        $(document).on('click','#btn_close',function(){
            $('form').trigger('reset');
            $('#message-delete').html('');
        });

    }


    function search_record()
    {
        $(document).on('keyup', '#search', function()
        {
            var data = $('#search').val();

                    if(data.length>1 && data !="")
                    {
                                $.ajax({
                                type: 'post',
                                url: 'search.php',
                                data:{ data:data },
                                success: function (response) {
                                    if(data !=""){

                                        $('#table').html(response);

                                         }
                                        
                                    }
                                });
                    }else{

                        view_Record();
                    }

        });
    }

    
function addSection()
{
    $(document).on('click','#addSection' , function()
    {
        var name = $(this).attr('data-name');
        var  html = "";
        //alert(name);

        if(name == "LOISIR" )
        {
            html += '<div id="NewRow">';
            html += '<div class="input-group mb-3" >';
            html += '<input type="text" name="hobbie[]"  id="hobbie" class="form-control m-input" placeholder=" " autocomplete="on">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#new'+ name).append(html);
        }
        if(name == "COMPETENCE" )
        {
            html += '<div id="NewRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="skill[]" id="skill" class="form-control m-input" placeholder=" " autocomplete="on" >';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>'; 
            $('#new' + name).append(html);
        }

        if(name == "FORMATION" )
        {
            html += '<div id="NewRow">';
            html += '<div class="form-group">';                   
            html += '<label style=\"color:blue; font-weight:bold; \" >INTITULÉ </label>'; 
            html += '<div class="input-group mb-3">';                       
            html += ' <input type="text" name="diplomaName[]" id="diplomaName" value="" class="form-control"  >'; 
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';                                
            html += ' </div>';                     
            html += '<div class="form-group">';                      
            html += '<label style=\"color:blue; font-weight:bold; \" > DATE DE DÉBUT </label>';                          
            html += '<input type="date" name="dp_startDate[]" id=" dp_startDate" value="" class="form-control"  >';                                  
            html += '</div>';                      
            html += '<div class="form-group">';                      
            html += ' <label style=\"color:blue; font-weight:bold; \" > DATE DE FIN </label>';                          
            html += ' <input type="date" name="dp_endDate[]"  id="dp_endDate" value="" class="form-control"  >';                                 
            html += ' </div>';                     
            html += '<div class="form-group">';                      
            html += '<label style=\"color:blue; font-weight:bold; \" > DÉSCRIPTION </label>';                          
            html += ' <input type="text" name="dp_description[]"  id="dp_description" class="form-control"  value="" > ';                                 
            html += '</div>';   
            html += '</div>';      

            $('#new'+ name).append(html);
        }

        if(name == "EXPERIENCE" )
        {
            html += '<div id="NewRow">';
            html += '<div class="form-group">';                   
            html += '<label style=\"color:blue; font-weight:bold; \" >INTITULÉ </label>';  
            html += '<div class="input-group mb-3">';
            html += ' <input type="text" name="experience[]" id="experience" value="" class="form-control"  >'; 
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';                                
            html += ' </div>';                     
            html += '<div class="form-group">';                      
            html += '<label style=\"color:blue; font-weight:bold; \" > DATE DE DÉBUT </label>';                          
            html += '<input type="date" name="ex_startDate[]" id="ex_startDate" value="" class="form-control"  >';                                  
            html += '</div>';                      
            html += '<div class="form-group">';                      
            html += ' <label style=\"color:blue; font-weight:bold; \" > DATE DE FIN </label>';                          
            html += ' <input type="date" name="ex_endDate[]"  id="ex_endDate" value="" class="form-control"  >';                                 
            html += ' </div>';                     
            html += '<div class="form-group">';                      
            html += '<label style=\"color:blue; font-weight:bold; \" > DÉSCRIPTION </label>';                          
            html += ' <input type="text"  name="ex_description[]"  id="ex_description" class="form-control" value=""  > ';                                 
            html += '</div>'; 
            html += '</div>';        

            $('#new'+ name).append(html);
        }     


    });



}


 function removeSection()
 {
        $(document).on('click','#removeRow', function()
         { 
            
             $(this).closest('#NewRow').remove();

         });
        
 }







