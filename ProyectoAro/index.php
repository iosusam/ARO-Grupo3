<?php
    
    include ("modelo.php");
    include ("vista.php");

	
    session_start();
	
    //Soy el controlador
    if (isset($_GET["accion"]))
    {
            $accion = $_GET["accion"]; 
    }	
    else
    {
        if (isset($_POST["accion"]))
        {
                $accion = $_POST["accion"];
        }
        else
        {
                $accion = "indexprincipal";
        }
    }	

    if (isset($_GET["id"]))
    {
            $id = $_GET["id"]; 
    }	
    else
    {
        if (isset($_POST["id"]))
        {
                $id = $_POST["id"];
        }
        else
        {
                $id = 1;
        }
    }	

    //Obtenemos todos los caminos posibles

    //Si el usuario acaba de entrar a la página por primera vez
    if ($accion == "indexprincipal") {
        switch ($id) {
            case '1':
                //Muestra la página principal de la web
                vmostrarindexprincipal();
                break;
        }
    }
    
    if ($accion == "registro") {
        switch ($id) {
            case '1':
                //Muestra  formulario de registro
                vmostraregistro();
                break;
            case '2':
                //Muestra  formulario de registro
                vmostraregistro();
                break;
        }
    }
    
    if ($accion == "contacto") {
        switch ($id) {
            case '1':
                //Muestra  formulario de registro
                vmostracontacto();
                break;
        }
    }
    
    if ($accion == "acercade") {
        switch ($id) {
            case '1':
                //Muestra  formulario de registro
                vmostraacercade();
                break;
        }
    }
    
?>