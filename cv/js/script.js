
$(document).ready(function(){

    insert_Record();
    view_Record();
    get_Record();
   // update_record();
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
            url : 'view.php ',
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

    $(document).on('click','#btn_edit',function()
    {
        
        var   id= $(this).attr('data-id');
       
    
                
                $.ajax(
                    {
                        url:"get_record.php",
                        method:'POST',
                        data:{ id:id },
                        success: function(data)
                        {
                                 // modal content:

                                 console.log(data);

                                    $('#modal_content').html(data); 
                                   $('#update').modal('show');
                              
                            
                     }
                           

                });  

            
        
    });
}



    function delete_record()
    {
        $(document).on('click','#btn_delete',function(){

            var  id = $(this).attr('data-id1'); 

            $('#message-delete').html("voulez vous vraiment supprimer ce CV ? </br> si oui cliquez sur le bouton delete Now");         
    
        
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

                    if(data.length>2 && data !="")
                    {
                                $.ajax({
                                url: 'search.php',
                                method: 'post',
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







