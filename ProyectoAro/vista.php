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
    //mostrar pagina para buscar por resturante y aparcamientos
    function vmostrarbuscar()
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
        $fich = fopen("templates/modificacliente.html", "r");
	$cadena = fread($fich, filesize("templates/modificacliente.html"));
	fclose($fich);
        $cadena = str_replace("##nombre##", $_SESSION["usuario"], $cadena);
	$cadena = str_replace("##Usuario##", $datosusuario[1], $cadena);
	$cadena = str_replace("##Correo##", $datosusuario[2], $cadena);
        $cadena = str_replace("##Contraseña##", $datosusuario[3], $cadena);
		
	echo $cadena; 
     }
     
     function vvalidarmodificarcliente($resultado)
     {
	if($resultado==1){
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Modificación", $cadena);
            $cadena = str_replace("##titulo##", "¡ENHORABUENA!", $cadena);
            $cadena = str_replace("##cuerpo##", "Se han modificado los datos correctamente.", $cadena);
            $cadena = str_replace("##boton##", "success", $cadena);
            $cadena = str_replace("##enlace##", "index.php?accion=menu&id=1", $cadena);

            echo $cadena;	
            
        }else{
            
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Modificación", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "No se han podido modificar los datos.Vuelva a intentarlo mas tarde", $cadena);
            $cadena = str_replace("##boton##", "danger", $cadena);
            $cadena = str_replace("##enlace##", "index.php?accion=menu&id=1", $cadena);
            
            echo $cadena;	
            
        }
    }

     
     function vmostrarbajacliente($datosusuario)
     {
        conectar();
	$cadena = file_get_contents("templates/bajacliente.html");
	$cadena = str_replace("##nombre##", $_SESSION["usuario"], $cadena);
	$cadena = str_replace("##Usuario##", $datosusuario[1], $cadena);
	$cadena = str_replace("##Email##", $datosusuario[2], $cadena);
        $cadena = str_replace("##Contraseña##", $datosusuario[3], $cadena);
		
	echo $cadena;

     }
     
     function vvalidarbajacliente($resultado)
     {
         if($resultado==1){
             
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Baja", $cadena);
            $cadena = str_replace("##titulo##", "¡ENHORABUENA!", $cadena);
            $cadena = str_replace("##cuerpo##", "Se ha dado de Baja correctamente.", $cadena);
            $cadena = str_replace("##boton##", "success", $cadena);
            $cadena = str_replace("##enlace##", "index.php", $cadena);

            echo $cadena;
            
            session_destroy();
            
	}else{
            $cadena = file_get_contents("templates/validarformulario.html");

            $cadena = str_replace("##titulopagina##", "Baja", $cadena);
            $cadena = str_replace("##titulo##", "¡AVISO!", $cadena);
            $cadena = str_replace("##cuerpo##", "Se ha dado de Baja incorrectamente.Vuelva a intentarlo mas tarde", $cadena);
            $cadena = str_replace("##boton##", "danger", $cadena);
            $cadena = str_replace("##enlace##", "index.php?accion=menu&id=1", $cadena);
            
            echo $cadena;
	}
     }
    
    function vobtenercoordenadasrestaurantes($restaurantes)
    {
        if ($restaurantes) {
            
            $i = 0;

            while ($datosrestaurantes = mysql_fetch_array($restaurantes))
            {
                if ($datosrestaurantes["Web"] != "")
                {
                    $array[$i] = array(
                        "X" => $datosrestaurantes["Coordenada_X"],
                        "Y" => $datosrestaurantes["Coordenada_Y"],
                        "Contenido" => "<div id=\"NombreBar\"><b>" . $datosrestaurantes["Nombre"] . "</b></div><div>" . $datosrestaurantes["Calle"] . "</br>" . $datosrestaurantes["CodigoPostal"] . " Pamplona (Navarra)</div><div>Sitio web de <a href='" . $datosrestaurantes["Web"] . "' TARGET='_blank'>" . $datosrestaurantes["Nombre"] . "</a></div>",
                    );
                }
                else
                {
                    $array[$i] = array(
                        "X" => $datosrestaurantes["Coordenada_X"],
                        "Y" => $datosrestaurantes["Coordenada_Y"],
                        "Contenido" => "<div id=\"NombreBar\"><b>" . $datosrestaurantes["Nombre"] . "</b></div><div>" . $datosrestaurantes["Calle"] . "</br>" . $datosrestaurantes["CodigoPostal"] . " Pamplona (Navarra)</div><div>" . $datosrestaurantes["Nombre"] . " no posee sitio web</div>",
                    );
                }
                
                $i++;
            }

            echo json_encode($array);
        }
    }
    
    function vobtenercoordenadasaparcamientos($parkings)
    {
        if ($parkings) { 
            
            $i = 0;

            while ($datosparkings = mysql_fetch_array($parkings))
            {
                $array[$i] = array(
                        "X" => $datosparkings["Coordenada_X"],
                        "Y" => $datosparkings["Coordenada_Y"],
                        "Contenido" => "<div id=\"NombreBar\"><b>" . $datosparkings["Nombre"] . "</b></div><div>" . $datosparkings["Calle"] . "</br>" . $datosparkings["CodigoPostal"] . " Pamplona (Navarra)</div><div>Numero de plazas: " . $datosparkings["Numero_plazas"] . "</div>",
                    );
                
                $i++;
            }

            echo json_encode($array);
        }
    }
    
    function vobtenercoordenadaszona($zona)
    {
        if ($zona) {
            
            $i = 0;

            while ($datoszona = mysql_fetch_array($zona))
            {

                $array[$i] = array(
                    "X" => $datoszona["Coordenada_X"],
                    "Y" => $datoszona["Coordenada_Y"],
                    "Nombre" => $datoszona["Nombre"]
                );
                
                $i++;
            }

            echo json_encode($array);
        }
    }
    
    function vbuscar_por_restaurante($prueba)
    {
        if ($prueba){
            $cadena = file_get_contents("templates/buscar_por_restaurante.html");
        
            $cadena = str_replace("##nombre##", $_SESSION["usuario"], $cadena);
            
            $trozos = explode("##linea##",$cadena);
            $cuerpo = "";
            while($resultado = mysql_fetch_array($prueba)){
                    $aux = $trozos[1];				
                    $aux = str_replace("##Restaurante##", $resultado["Nombre"], $aux);
                    $aux = str_replace("##idRestaurante##", $resultado["Id"], $aux);
                    $cuerpo = $cuerpo . $aux;
            }
            echo $trozos[0] . $cuerpo . $trozos[2];
        }        
    }
    
    function vbuscar_por_restaurante_valoracion($valoracion,$restaurante)
    {   
        if($valoracion && $restaurante )
        {        
            $cadena = file_get_contents("templates/comentarios.html");
        
            $trozos = explode("##linea##",$cadena);
            $cuerpo = "";
            $restaurante = mysql_fetch_array($restaurante);
            $resultado = mysql_fetch_array($valoracion);
            if($resultado)
            {
                $aux = $trozos[1];				
                $aux = str_replace("##NombreRestaurante##", $restaurante["Nombre"], $aux);
                $aux = str_replace("##NombreUsuario##", $resultado["NombreUsuario"], $aux);
                $aux = str_replace("##PuntuacionGeneral##", $resultado["PuntuacionGeneral"], $aux);
                $aux = str_replace("##Comentario##", $resultado["Comentario"], $aux);
                $aux = str_replace("##TipoVisita##", $resultado["TipoVisita"], $aux);
                $aux = str_replace("##Motivo##", $resultado["Motivo"], $aux);
                $aux = str_replace("##Fecha##", $resultado["Fecha"], $aux);
                $aux = str_replace("##Servicio##", $resultado["Servicio"], $aux);
                $aux = str_replace("##Comida##", $resultado["Comida"], $aux);
                $aux = str_replace("##RelacionCalidadPrecio##", $resultado["RelacionCalidadPrecio"], $aux);
                $aux = str_replace("##PlatosRecomendables##", $resultado["PlatosRecomendables"], $aux);
            
                $cuerpo = $cuerpo . $aux;
                
                while($resultado = mysql_fetch_array($valoracion)){
                    $aux = $trozos[1];				
                    $aux = str_replace("##NombreRestaurante##", $restaurante["Nombre"], $aux);
                    $aux = str_replace("##NombreUsuario##", $resultado["NombreUsuario"], $aux);
                    $aux = str_replace("##PuntuacionGeneral##", $resultado["PuntuacionGeneral"], $aux);
                    $aux = str_replace("##Comentario##", $resultado["Comentario"], $aux);
                    $aux = str_replace("##TipoVisita##", $resultado["TipoVisita"], $aux);
                    $aux = str_replace("##Motivo##", $resultado["Motivo"], $aux);
                    $aux = str_replace("##Fecha##", $resultado["Fecha"], $aux);
                    $aux = str_replace("##Servicio##", $resultado["Servicio"], $aux);
                    $aux = str_replace("##Comida##", $resultado["Comida"], $aux);
                    $aux = str_replace("##RelacionCalidadPrecio##", $resultado["RelacionCalidadPrecio"], $aux);
                    $aux = str_replace("##PlatosRecomendables##", $resultado["PlatosRecomendables"], $aux);
            
                    $cuerpo = $cuerpo . $aux;
                }
            }
            else
            {
                echo "No hay ningun comentario, se el primero.";
            }
            
        }
        echo $trozos[0] . $cuerpo . $trozos[2];
    }
    
?>