<?php
    
    function vmostrarindexprincipal()
    {
        echo file_get_contents("templates/index.html");
    }
    
    function vmostraregistro()
    {
        echo file_get_contents("templates/registro.html");
    }
    
    function vmostracontacto()
    {
        echo file_get_contents("templates/contacto.html");
    }
    
    function vmostraacercade()
    {
        echo file_get_contents("templates/acercade.html");
    }
?>