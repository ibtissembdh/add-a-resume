<?php

class section{

    Public $name;
    Public $fields;

    public function __construct( $name ,array $fields = null){
       $this->name = $name;
       if($fields)
       {
           $this->fields = $fields ;
       }

    }
    public Function getStartTag(){
       $html  = "<section class=\"list-group-item list-group-item-action\">" ;
       $html .= "<div class=\"form-group\">";
       $html .= "<label style=\"color:blue; font-weight:bold; \" >".$this->name."</label>";
       if( $this->name =="INFORMATION PÉRSONNEL" ||  $this->name == "MODIFIER FORMATION" || $this->name =="MODIFIER EXPERIENCE"  || $this->name == "MODIFIER LOISIR" || $this->name  == "MODIFIER COMPETENCE")
       {
         return $html ;

       }else{

        $html .= '<button style="float:right;"  id="addSection" data-name ="'.$this->name.'" type="button" class="btn btn-primary"> Add </button> ';
        return $html ;

       }
       
   }

   public Function getEndTag(){ return " <div id=\"new$this->name\"> </div> </div> </section>" ; }

   public function getFields()
   {
      
       return $this->fields;
   }




}