<?php

class Field {
    Public $label;
    public $type;
    public $name;
    public $value;
    public $placeholder;

    public function __construct($label ,$type, $name ,$value ,$placeholder){
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
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
                    $html .= " id=\"$this->name\"";
                    $html .= " placeholder=\"$this->placeholder\"";
                    $html .= ">"; 
                    $html .= '</div>';  
                    $html .= '</div>';                                            
                
                    return $html;
    
    }
}


