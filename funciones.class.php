<?php
class funciones
{   
    var $mysqli;
    function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    function openModule($idmodulo) {
        if (file_exists("modules/$idmodulo.php")) {
            require "modules/$idmodulo.php";
        }
        else 
        {
            echo ("<img src='https://www.gstatic.com/youtube/src/web/htdocs/img/monkey.png' alt='??'>"); 
        }
        
    }
}
?>