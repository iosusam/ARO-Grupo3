<?php
    //mostrar pagina principal
    function vmostrarindexprincipal()
    {
        echo file_get_contents("templates/index.html");
    }
    //mostrar pagina registro
    function vmostraregistro()
    {
        echo file_get_contents("templates/registro.html");
    }
    //mostrar pagina de contacto
    function vmostracontacto()
    {
        echo file_get_contents("templates/contacto.html");
    }
    //mostrar pagina acerca de la empresa
    function vmostraacercade()
    {
        echo file_get_contents("templates/acercade.html");
    }
    //mostrar pagina para buscar por resturante
    function vmostrarbuscarporresturante()
    {
        echo file_get_contents("templates/buscar.html");
    }
    //Funcion que valida el registro
    function vvalidarregistro($valor)
    {
        if ($valor == 1) {
			
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Registro", $cadena);
            $cadena = str_replace("##titulo##", "¡ENHORABUENA!", $cadena);
            $cadena = str_replace("##cuerpo##", "Se ha completado el registro correctamente.", $cadena);
            $cadena = str_replace("##boton##", "success", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;

        }
        elseif ($valor == 2) {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Registro", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "Ha habido un error al registrar el usuario. Vuelva a intentarlo más tarde.", $cadena);
            $cadena = str_replace("##boton##", "danger", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
        }
        elseif ($valor == 3) {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Registro", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "El correo ingresado ya está registrado. Pruebe con otro distinto.", $cadena);
            $cadena = str_replace("##boton##", "warning", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
        }
    }
    function vmostrarlogin()
    {
            echo file_get_contents("templates/login.html");
    }
    //Funcion que muestra la validacion del Login, ya sea correcto o incorrecto
    function vvalidarlogin($usuario)
    {
        if (mysql_num_rows($usuario) == 1) {
            
            $datosusuario = mysql_fetch_array($usuario);
            $_SESSION["usuario"] = $datosusuario["Nombre"];
            $_SESSION["contrasena"] = $datosusuario["Contrasena"];
            $_SESSION["correo"] = $datosusuario["Correo"];
			
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡ENHORABUENA!", $cadena);
            $cadena = str_replace("##cuerpo##", "Se ha logueado correctamente.", $cadena);
            $cadena = str_replace("##boton##", "success", $cadena);
            $cadena = str_replace("##enlace##", "index.php?accion=menu&id=1", $cadena);

            echo $cadena;

        }
        /*
         * ADMIN
         * elseif ($usuario == 5) {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡ENHORABUENA!", $cadena);
            $cadena = str_replace("##cuerpo##", "SE HA CONECTADO COMO ADMIN.", $cadena);
            $cadena = str_replace("##boton##", "success", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
        }*/
        else {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "Usuario o contraseña incorrectos. Vuelva a intentarlo.", $cadena);
            $cadena = str_replace("##boton##", "danger", $cadena);
            $cadena = str_replace("##enlace##", "index.php?accion=login&id=1", $cadena);

            echo $cadena;
        }
    }
    //Mostrar al pulsar Boton desconectarse
    function vmostrarlogout($valor)
    {
        if ($valor == 1) {
			
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Log Out", $cadena);
            $cadena = str_replace("##titulo##", "¡HASTA LUEGO!", $cadena);
            $cadena = str_replace("##cuerpo##", "Ha salido correctamente", $cadena);
            $cadena = str_replace("##boton##", "success", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;

        }
    }
    
    function vmostrarindexlogueado()
    {
        $cadena = file_get_contents("templates/index_logueado.html");
        
        $cadena = str_replace("##nombre##", $_SESSION["usuario"], $cadena);
        
        echo $cadena;
    }
    
    function vmostrarlistadocliente($datosusuario)
    {
	$cadena = file_get_contents("templates/bajaymodificacionusuario.html");
        $cadena = str_replace("##nombre##", $_SESSION["usuario"], $cadena);
	$cadena = str_replace("##Usuario##", $datosusuario[1], $cadena);
	$cadena = str_replace("##Email##", $datosusuario[2], $cadena);
        $cadena = str_replace("##Contraseña##", $datosusuario[3], $cadena);
		
	echo $cadena;	
    }
    
     function vmostrarmodificarcliente($datosusuario)
     {
        conectar();
        $fich = fopen("modificacliente.html", "r");
	$cadena = fread($fich, filesize("modificacliente.html"));
	fclose($fich);
        $cadena = str_replace("##nombre##", $_SESSION["usuario"], $cadena);
	$cadena = str_replace("##Usuario##", $datosusuario[1], $cadena);
	$cadena = str_replace("##Email##", $datosusuario[2], $cadena);
        $cadena = str_replace("##Contraseña##", $datosusuario[3], $cadena);
		
	echo $cadena; 
     }
    
    function vobtenercoordenadas($restaurantes)
    {
        if ($restaurantes) {

            $cadena = "[";
            
            $i = 0;

            while ($datosrestaurantes = mysql_fetch_array($restaurantes))
            {
                if ($i == 0)
                {
                    $cadena .= "{position: {lat: 42.812152,lng: -1.649228},contenido: \"Soy el primero\"}";
                    $i = 1;
                }
                else
                {
                    $cadena .= ",{position: {lat: 42.832586,lng: -1.586164},contenido: \"Soy el segundo\"}";
                }
            }
            
            $cadena .= "];";

            echo $cadena;
        }
    }
    
?>