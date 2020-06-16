<?php


class form{
    Public $method;
    Public $action;
    PUblic $sections;


    Public Function __construct($method , $action , array  $sections = null)
    {
        $this->method = $method;
        $this->action = $action ;
        if($sections)
        {  
            $this->sections = $sections ;
        }    
    }
    
    Public Function getStartTag()
    {
        $html = "<form method=\"$this->method\" action= \"$this->action\" >" ;
        return $html;
    }
    
    public function getSections()
    {
        return $this->sections;
    }

    public function getEndTag()
    {
        return "</form>";
    }


}
