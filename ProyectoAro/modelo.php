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

        $consulta = mysql_query("select * from Usuario where Contrasena like '$pass' and Correo like '$correo'");

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
    

?>