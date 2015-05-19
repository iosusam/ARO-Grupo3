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
        $correo = limpiarCadena($_POST["Correo"]);
        $pass = md5(limpiarCadena($_POST["Password"]));

        conectar();

        $consulta = mysql_query("select * from usuario where Contrasena like '$pass' and Correo like '$correo'");

        if (mysql_num_rows($consulta) == 1)
        {
            //Login correcto.
            return $consulta;
        }
        else
        {
            //Error al loguear
            return $consulta;
        }
    }
    
    function mlistadocliente()
    {
        $correo = limpiarCadena($_SESSION["correo"]);
        $pass = md5(limpiarCadena($_SESSION["contrasena"]));
        
        
	conectar();
	$consulta = mysql_query("select * from Usuario where Correo like '$correo' ");
	$resultado = mysql_fetch_array($consulta);
	return $resultado;
    }
    
    function mvalidarmodificarcliente()
    {
        $nombre = limpiarCadena($_POST["Usuario"]);
        $correo = limpiarCadena($_POST["Correo"]);
                
        conectar();
        
        $datosusuario = mysql_query("select * from Usuario where Correo like '". $_SESSION["correo"]  . "'");
        
        $usuario = mysql_fetch_array($datosusuario);
        
        $consulta = mysql_query("select * from Usuario where Correo like '$correo' and Id <> ". $usuario["Id"]  . "");
        
        if (mysql_num_rows($consulta) == 1)
        {
            //Correo Registrado.
            return -1;
        }
        else
        {
            //Correo no registrado,se modifica
            $consulta = mysql_query("UPDATE Usuario SET `Nombre` = '$nombre' ,`Correo` = '$correo' where Id= ". $usuario["Id"]  . " ");
        
            $_SESSION["usuario"] = $nombre;
            $_SESSION["correo"] = $correo;
            return $consulta;
        }
        
        
    }
    
    function mvalidarbajacliente()
    {
        $correo = limpiarCadena($_SESSION["correo"]);
        
	conectar();
	$consulta = "DELETE FROM Usuario WHERE Correo = '$correo';";
	$valor = mysql_query($consulta);
	return $valor;
		
    }
    
    function mobtenercoordenadasrestaurantes()
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        return mysql_query("select * from Restaurante");
    }
    
    function mobtenercoordenadasaparcamientos($valor)
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        return mysql_query("select * from parking where Gratuito = '$valor'");
    }
    
    function mobtenercoordenadaszonaazul()
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        return mysql_query("select * from zonaazul");
    }
    
    function mobtenercoordenadaszonaroja()
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        return mysql_query("select * from zonaroja");
    }
    
    function mobtenercoordenadaszonaverde()
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        return mysql_query("select * from zonaverde");
    }
    
    function mbuscar_por_restaurante()
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        $resultado = mysql_query("select * from restaurante");
        
        return $resultado;
    }
    
    function mbuscar_por_restaurante_id_valoracion($id)
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        $resultado = mysql_query("SELECT * FROM `valoracion` WHERE `IdRestaurante` =  '$id'");
        
        return $resultado;
    }
    
    function mbuscar_por_restaurante_id_restaurante($id)
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        $resultado = mysql_query("SELECT * FROM `restaurante` WHERE `Id` =  '$id'");
                
        return $resultado;
    }
    
    function mguardarcomentario()
    {
        conectar();
        
        mysql_query("SET NAMES 'utf8'");
        
        $comentario = $_POST["Comentario"];
        $TipoVisita = $_POST["TipoVisita"];
        $Motivo = $_POST["Motivo"];
        $PlatosRecomendables = $_POST["PlatosRecomendables"];
        $Fecha = $_POST["Fecha"];
        $comentario = $_POST["Comentario"];
        $comentario = $_POST["Comentario"];
        $comentario = $_POST["Comentario"];
        
        
        
        mysql_query("insert into valoracion (NombreUsuario,IdRestaurante,PuntuacionGeneral,Comentario,TipoVisita,Motivo,Fecha,Servicio,Comida,PlatosRecomendables) values ('','$correo','$contrasenaMD5')");
    }

?>
