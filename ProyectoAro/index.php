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
    
    if (isset($_GET["restaurante"]))
    {
        $restaurante = $_GET["restaurante"];
    }

    //Obtenemos todos los caminos posibles
    
    if (isset($_SESSION["usuario"]) && isset($_SESSION["contrasena"])) {
        
        if ($accion == "menu"){
            switch($id){
                case '1':
                    //Muestra la pagina principal del usuario logueado
                    vmostrarindexlogueado();
            }
        }
        
        if($accion == "perfil"){
            switch ($id){
		case 1 : 
                    //Mostrar los datos del cliente
                    vmostrarlistadocliente(mlistadocliente());
                    break;
		case 2 : 
                    //Mostrar el formulario con los datos de la persona a modificar
                    vmostrarmodificarcliente(mlistadocliente());
                    break;
		case 3 : 
                    //Validar la modificaciÃ³n en la base de datos
                    vvalidarmodificarcliente(mvalidarmodificarcliente());
                    break;
		case 4 : 
                    //Mostrar los datos de la persona a eliminar
                    vmostrarbajacliente(mlistadocliente());
                    break;
		case 5 : 
                    //Validar la eliminaciÃ³n
                    vvalidarbajacliente(mvalidarbajacliente());
                    break;
            }
	}
        
        if ($accion == "valoracion") {
            switch ($id) {
                case '1':
                    // muestra la lista de los restaurantes
                    vbuscar_por_restaurante(mbuscar_por_restaurante());
                    break;
                case '2':
                    //muestra la valoracion del restaurante
                    vbuscar_por_restaurante_valoracion(mbuscar_por_restaurante_id_valoracion($restaurante),mbuscar_por_restaurante_id_restaurante($restaurante));
                    break;
                case '3':
                    //muestra el formulario para el comentario
                    vconfirmacion_formulario(mguardarcomentario());
                    break;
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

    //Si el usuario acaba de entrar a la página por primera vez
    elseif ($accion == "indexprincipal") {
        switch ($id) {
            case '1':
                //Muestra la página principal de la web
                vmostrarindexprincipal();
                break;
        }
    }
    
    elseif ($accion == "registro") {
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
    
    elseif ($accion == "contacto") {
        switch ($id) {
            case '1':
                //Muestra  formulario de registro
                vmostracontacto();
                break;
        }
    }
    
    elseif ($accion == "acercade") {
        switch ($id) {
            case '1':
                //Muestra  formulario de registro
                vmostraacercade();
                break;
        }
    }
    
    elseif ($accion == "login") {
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
    
    elseif ($accion == "buscar") {
        switch ($id) {
            case '1':
		vmostrarbuscar();
		break;
            case '2':
		vobtenercoordenadasrestaurantes(mobtenercoordenadasrestaurantes());
		break;
            case '3':
		vobtenercoordenadasaparcamientos(mobtenercoordenadasaparcamientos(1));
		break;
            case '4':
                vobtenercoordenadasaparcamientos(mobtenercoordenadasaparcamientos(0));
                break;
            case '5':
                vobtenercoordenadaszona(mobtenercoordenadaszonaazul());
                break;
            case '6':
                vobtenercoordenadaszona(mobtenercoordenadaszonaroja());
                break;
            case '7':
                vobtenercoordenadaszona(mobtenercoordenadaszonaverde());
                break;
        }
    }
    
    
?>