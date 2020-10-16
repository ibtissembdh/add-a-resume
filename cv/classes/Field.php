<?php

class Field {
    Public $label;
    public $type;
    public $name;
    public $id;
    public $value;
    public $placeholder;

    public function __construct($label ,$type, $name , $id , $value ,$placeholder){
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->placeholder = $placeholder;

    }

    public function getName(){
        return $this->name;
    }

    public function getTag(){
            
                    $html ='<div class="list-group">';
                    $html .= '<div class="form-group">';                   
                    $html .= "<label style=\"color:blue; font-weight:bold; \" > $this->label</label>";   
                    $html .= "<input  class=\"form-control\" ";
                    $html .= " type=\"$this->type\"";
                    $html .= " name=\"$this->name\"";
                    $html .= " id=\"$this->id\"";
                    $html .= " value=\"$this->value\" "; 
                    $html .= " placeholder=\"$this->placeholder\"  ";
                    $html .= ">"; 
                    $html .= '</div>';  
                    $html .= '</div>';   
                                                             
                
                    return $html;
    
    }
}


