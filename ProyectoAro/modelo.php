<?php

    function conectar()
    {
        //Conectar a la base de datos
        $enlace = mysql_connect("localhost","root","") or die("No me he podido conectar");

        //Elegimos base de datos
        $bd = mysql_select_db("Park-Eat", $enlace) or die("No hemos podido coger la base de datos");
    }

    function limpiarCadena($valor)
    {
        $valor = str_ireplace("SELECT","",$valor);
        $valor = str_ireplace("COPY","",$valor);
        $valor = str_ireplace("DELETE","",$valor);
        $valor = str_ireplace("SCRIPT","",$valor);
        $valor = str_ireplace("DROP","",$valor);
        $valor = str_ireplace("DUMP","",$valor);
        $valor = str_ireplace(" OR ","",$valor);
        $valor = str_ireplace("%","",$valor);
        $valor = str_ireplace("LIKE","",$valor);
        $valor = str_ireplace("--","",$valor);
        $valor = str_ireplace("^","",$valor);
        $valor = str_ireplace("[","",$valor);
        $valor = str_ireplace("]","",$valor);
        $valor = str_ireplace("\\","",$valor);
        $valor = str_ireplace("!","",$valor);
        $valor = str_ireplace("¡","",$valor);
        $valor = str_ireplace("?","",$valor);
        $valor = str_ireplace("=","",$valor);
        $valor = str_ireplace("&","",$valor);
        $valor = str_ireplace("<","",$valor);
        $valor = str_ireplace(">","",$valor);
        return $valor;
    }
    
    function mregistrarusuario()
    {
        $nombre = limpiarCadena($_POST["Nombre"]);
        $correo = limpiarCadena($_POST["Correo"]);
        $password = limpiarCadena($_POST["Password"]);
        $passwordRepetida = limpiarCadena($_POST["PasswordRepetida"]);


        conectar();
        $correorepetido = mysql_query("select * from Usuario where Correo='$correo'");
        if (mysql_num_rows($correorepetido) == 0) {
                //Correo no registrado todavía
                $contrasenaMD5 = md5($password);
                $consulta = mysql_query("insert into Usuario (Nombre,Correo,Contrasena) values ('$nombre','$correo','$contrasenaMD5')");
                //usuario registrado
                if ($consulta)
                {
                    //usuario registrado correctamente
                    return 1;
                }
                else
                {
                    //Fallo al registrar el usuario
                    return 2;
                }
        }
        else
        {
                //Correo registrado
                return 3;
        }
		
    }
    
    function mloguearusuario()
    {
        /************************************************
		FunciÃ³n encargada de realizar la validaciÃ³n de login
		Devuelve:
		 1 --> Todo ha ido bien
		 2 --> El login no es correcto
		 3 --> No se ha introducido el usuario
		 4 --> No se ha introducido la contraseña
                 5-->Se ha conectado el ADMIN
	********************************************************/
        
        $nombre = limpiarCadena($_POST["Nombre"]);
        $password = limpiarCadena($_POST["Password"]);
        $contrasenaMD5 = md5($password);
        
	conectar();
	if (strlen($_POST["Nombre"]) == 0)
	{
		return 3;
	}
	else
	{
		if (strlen($_POST["Password"]) == 0)
		{
			return 4;
		}
		else
		{
			$consulta = "select * from Usuario where Nombre= '$nombre' and Contraseña = '$contrasenaMD5'";
			$resultado = mysql_query($consulta);
			$valor = mysql_fetch_array($resultado);
			$num_filas =  mysql_num_rows($resultado);
			if ($num_filas > 0 )
			{
				$_SESSION["Datos_Usuario"] = $valor;
				$_SESSION["Datos_Usuario"][2] = $_POST["Password"];
				$_SESSION["Datos_Usuario"]["Password"] = $_POST["Password"];
				if (($_SESSION["Datos_Usuario"]["Nombre"]=="Admin") && ($_SESSION["Datos_Usuario"]["Password"]=="Admin"))
				{
					return 5;
				}else{
					return 1;
				}
			}
			else
			{
				return 2;
			}
		}
        }	
    }
    

?>