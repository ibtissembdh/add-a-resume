<?php

  require "includes/config.inc.php";
  require "includes/Functions.php";  

  if($_GET['id'])
  {
     $id = $_GET['id'];
  }
 
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

 <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Resume</title>
            <link type="text/css" rel="stylesheet" href="css/purple.css" />
            <link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
            <!--[if IE 7]>
            <link href="css/ie7.css" rel="stylesheet" type="text/css" />
            <![endif]-->
            <!--[if IE 6]>
            <link href="css/ie6.css" rel="stylesheet" type="text/css" />
            <![endif]-->
            <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
            <script type="text/javascript" src="js/jquery.tipsy.js"></script>
            <script type="text/javascript" src="js/cufon.yui.js"></script>
            <script type="text/javascript" src="js/scrollTo.js"></script>
            <script type="text/javascript" src="js/myriad.js"></script>
            <script type="text/javascript" src="js/jquery.colorbox.js"></script>
            <script type="text/javascript" src="js/custom.js"></script>
            <script type="text/javascript">
                Cufon.replace('h1,h2');
              </script>
      </head> 

      <body id="body">

        <?= $body =  get_user_resume($id); ?>


       </body>

 </html>

