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
                vvalidarregistro(mregistrarusuario());
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
    
    if ($accion == "login") {
        switch ($id) {
            case '1':
                //Muestra el formulario del login
                vmostrarlogin();
                break;
            
            case '2':
                //Muestra  formulario del login
                vvalidarlogin(mloguearusuario());
                break;
                
        }
    }
    if (isset($_SESSION["usuario"]) && isset($_SESSION["contrasena"])) {
        
        if ($accion == "menu"){
            switch($id){
                case '1':
                    //Muestra la pagina principal del usuario logueado
                    vmostrarindexlogueado();
            }
        }
        
        if ($accion == "logout") {
            switch ($id) {
                case '1':
                    session_destroy();
                    vmostrarlogout(1);
                    break;
                }
        }
    }
    
    if ($accion == "buscar") {
        switch ($id) {
            case '1':
		vmostrarbuscarporresturante();
		break;
        }
    }
    
?>