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
    
    function vvalidarlogin($valor)
    {
        if ($valor == 1) {
			
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡ENHORABUENA!", $cadena);
            $cadena = str_replace("##cuerpo##", "Se ha Logueado correctamente.", $cadena);
            $cadena = str_replace("##boton##", "success", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;

        }
        elseif ($valor == 2) {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "Ha habido un error al Loguear el usuario. Vuelva a intentarlo más tarde.", $cadena);
            $cadena = str_replace("##boton##", "danger", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
        }
        elseif ($valor == 3) {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "Ha habido un error al Loguear el usuario. Vuelva a intentarlo más tarde.", $cadena);
            $cadena = str_replace("##boton##", "danger", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
        }
        elseif ($valor == 3) {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "El Nombre ingresado es erroneo o vacio. Pruebe con otro distinto.", $cadena);
            $cadena = str_replace("##boton##", "warning", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
        }
        elseif ($valor == 4) {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "El Password ingresado es erroneo o vacio. Pruebe con otro distinto.", $cadena);
            $cadena = str_replace("##boton##", "warning", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
        }
        elseif ($valor == 5) {
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Login", $cadena);
            $cadena = str_replace("##titulo##", "¡ENHORABUENA!", $cadena);
            $cadena = str_replace("##cuerpo##", "SE HA CONECTADO COMO ADMIN.", $cadena);
            $cadena = str_replace("##boton##", "success", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
        }
    }
?>