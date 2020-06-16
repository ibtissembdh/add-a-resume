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
       return $html ;
   }

   public Function getEndTag(){ return " </div> </section>" ; }

   public function getFields()
   {
      
       return $this->fields;
   }




}