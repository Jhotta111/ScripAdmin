<?php
// Función de recogida de datos
function recoge($key, $type = "")
{
    if (!is_string($key) && !is_int($key) || $key == "") {
        trigger_error("Function recoge(): Argument #1 (\$key) must be a non-empty string or an integer", E_USER_ERROR);
    } elseif ($type !== "" && $type !== []) {
        trigger_error("Function recoge(): Argument #2 (\$type) is optional, but if provided, it must be an empty array or an empty string", E_USER_ERROR);
    }
    $tmp = $type;
    if (isset($_REQUEST[$key])) {
        if (!is_array($_REQUEST[$key]) && !is_array($type)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$key]));
        } elseif (is_array($_REQUEST[$key]) && is_array($type)) {
            $tmp = $_REQUEST[$key];
            array_walk_recursive($tmp, function (&$value) {
                $value = trim(htmlspecialchars($value));
            });
        }
    }
    return $tmp;
}
//Equipo
$equipo = recoge("npc");//Nombre del equipo
$equipoOK = FALSE;

$ip = recoge("ip");// IP del equipo
$ipOK = FALSE;

$mascara = recoge("mask");//Marcara de la red
$mascaraOK = FALSE;

$gateway = recoge("gtw");//uerta de enlace
$gatewayOK = FALSE;

$primario = recoge("dns1");//Servidor primario 
$primarioOK = FALSE;

$secudario = recoge("dns2");//Servidor secudario
$secudarioOK = FALSE;


//Dominio
$dominio = recoge("ndom");//Nombre del dominio
$dominioOK = FALSE;

$extension = recoge("exdom");//Extension del dominio
$extensionOK = FALSE;

$claveDom = recoge("cdom");//Contraeña del dominio
$claveDomOK = FALSE;

$reiniciar = recoge("rebot");//Reiniciar el sistema cuando se acabe el proceso
$reiniciarOK = FALSE;


//Usuario
$usuario = recoge("usun");//Nombre de usuario
$usuarioOK = FALSE;

$claveUS = recoge("clave");//Contraseña del usuario
$claveUSOK = FALSE;

$cambio = recoge("pcc");//El usuario puede cambiar la clave =  (si o no)
$cambioOK = FALSE;

$tiposA = recoge("tipus");//El suario será admin? =  (stan admin)
$tiposAOK = FALSE;

$activar = recoge("aimed");// Activarlo inmediatamente =  (si o no)
$activarOK = FALSE;

$admin = recoge("hdcm");// Hacer o descarcartar como admin o añadir a un grupo =  (had o dca o agrp)
$adminOK = FALSE;




//Grupos
$grupo = recoge("ngrp");// Nombre del grupo
$grupoOK = FALSE;

$tiposG = recoge("tdg");//Tipo de grupos
$tiposGOK = FALSE;

$seguro = recoge("gsec");//Grupo seguro = gsec (sec o nsec)
$seguroOK = FALSE;


//Unidad Organizativa
$unidad = recoge("unor"); //Nombre de la Unidad Organizativa
$unidadOK = FALSE;


//Carpetas
$crear = recoge("ccarp");//Crear carpetas
$crearOK = FALSE;

$borrar = recoge("bcarp");//Borrar carpetas
$borrarOK = FALSE;



















//Validacion de datos del equipo
if ($equipo == "") {
    print "<p style=\"color: red;\">Introduce el nombre del equipo</p>\n";
} elseif (strlen($equipo) > 15) {
    print "<p style=\"color: red;\">El texto tiene más de 15 caracteres</p>\n";
    } elseif (preg_match('/\s/', $equipo)) {
        print "<p style=\"color: red;\">El nombre del equipo no puede contener espacios</p>\n";
    } elseif (!preg_match('/\d/', $equipo)) {
        print "<p style=\"color: red;\">El nombre del equipo no puede contener números</p>\n";
    } else {
        $equipoOK = true;
    }


    //Validacion de datos de la red
    if ($ip == "") {
        print "<p style=\"color: red;\">Ladirección IP del equipo no puede estacío</p>\n";
    } elseif (strlen($ip) < 4 && strlen($ip) > 32) {
        print "<p style=\"color: red;\">La IP introducida no está dentro del rango</p>\n";
        } elseif (preg_match('/\s/', $ip)) {
            print "<p style=\"color: red;\">La IP del equipo no puede contener espacios</p>\n";
        } elseif (!preg_match('/\d/', $ip)) {
            print "<p style=\"color: red;\">El nombre del equipo no puede contener números</p>\n";
        } elseif (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return "El texto no es una dirección IPv4 válida.";
    }elseif (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        return "El texto no es una dirección IPv6 válida.";
    } else {
            $ipOK = true;
        }



        //Validacion de datos de la mascara
        if ($mascara == "") {
            print "<p style=\"color: red;\">Ladirección mascara del equipo no puede estacío</p>\n";
        } elseif (strlen($mascara) < 4 && strlen($mascara) > 32) {
            print "<p style=\"color: red;\">La mascara introducida no está dentro del rango</p>\n";
            } elseif (preg_match('/\s/', $mascara)) {
                print "<p style=\"color: red;\">La IP del equipo no puede contener espacios</p>\n";
            } elseif (!preg_match('/\d/', $mascara)) {
                print "<p style=\"color: red;\">La mascara del equipo no puede contener números</p>\n";
            } elseif (!filter_var($mascara, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "El texto no es una mascara IPv4 válida.";
        }elseif (!filter_var($mascara, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return "El texto no es una mascara IPv6 válida.";
        } else {
                $mascaraOK = true;
            }
    

//Validacion de datos de la gateway
        if ($ip == "") {
            print "<p style=\"color: red;\">Ladirección IP del equipo no puede estacío</p>\n";
        } elseif (strlen($gateway) < 4 && strlen($gateway) > 32) {
            print "<p style=\"color: red;\">La gateway introducida no está dentro del rango</p>\n";
            } elseif (preg_match('/\s/', $gateway)) {
                print "<p style=\"color: red;\">La gateway del equipo no puede contener espacios</p>\n";
            } elseif (!preg_match('/\d/', $gateway)) {
                print "<p style=\"color: red;\">El gateway del equipo no puede contener números</p>\n";
            } elseif (!filter_var($gateway, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "El texto no es una gateway IPv4 válida.";
        }elseif (!filter_var($gateway, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return "El texto no es una gateway IPv6 válida.";
        } else {
                $gatewayOK = true;
            }
    

//Validacion de datos de la DNS 1
        if ($primario == "") {
            print "<p style=\"color: red;\">Ladirección IP del equipo no puede estacío</p>\n";
        } elseif (strlen($primario) < 4 && strlen($primario) > 32) {
            print "<p style=\"color: red;\">La IP introducida no está dentro del rango</p>\n";
            } elseif (preg_match('/\s/', $primario)) {
                print "<p style=\"color: red;\">La primario del equipo no puede contener espacios</p>\n";
            } elseif (!preg_match('/\d/', $primario)) {
                print "<p style=\"color: red;\">El primario del equipo no puede contener números</p>\n";
            } elseif (!filter_var($primario, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "El texto no es una dirección IPv4 válida.";
        }elseif (!filter_var($primario, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return "El texto no es una primario IPv6 válida.";
        } else {
                $primarioOK = true;
            }
    

 //Validacion de datos de la DNS 2
        if ($secudario == "") {
            print "<p style=\"color: red;\">El DNS 2 del equipo no puede estacío</p>\n";
        } elseif (strlen($secudario) < 4 && strlen($secudario) > 32) {
            print "<p style=\"color: red;\">El DNS 2 introducida no está dentro del rango</p>\n";
            } elseif (preg_match('/\s/', $secudario)) {
                print "<p style=\"color: red;\">El DNS 2 del equipo no puede contener espacios</p>\n";
            } elseif (!preg_match('/\d/', $secudario)) {
                print "<p style=\"color: red;\">El DNS 2 del equipo no puede contener números</p>\n";
            } elseif (!filter_var($secudario, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return "El DNS 2 no es una dirección válida.";
        }elseif (!filter_var($secudario, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return "El texto no es una DNS 2 seundario válida.";
        } else {
                $secudarioOK = true;
            }
    

// Ejemplo de uso
$texto = "192.168.1.1"; // Prueba con una dirección IP válida o inválida
$resultado = validarIP($texto);
echo $resultado;







//Validacion de datos del dominio
if ($dominio == "") {
    print "<p style=\"color: red;\">Introduce el nombre del dominio</p>\n";
} elseif (strlen($dominio) > 15) {
    print "<p style=\"color: red;\">El texto tiene más de 15 caracteres</p>\n";
    } elseif (preg_match('/\s/', $dominio)) {
        print "<p style=\"color: red;\">El nombre del dominio no puede contener espacios</p>\n";
    } elseif (!preg_match('/\d/', $dominio)) {
        print "<p style=\"color: red;\">El nombre del dominio no puede contener números</p>\n";
    } else {
        $dominioOK = true;
    }



//Validacion de datos de la extension
if ($extension == "") {
    print "<p style=\"color: red;\">Introduce el nombre del extension</p>\n";
} elseif (strlen($extension) > 15) {
    print "<p style=\"color: red;\">El texto tiene más de 15 caracteres</p>\n";
    } elseif (preg_match('/\s/', $extension)) {
        print "<p style=\"color: red;\">El nombre del extension no puede contener espacios</p>\n";
    } elseif (!preg_match('/\d/', $extension)) {
        print "<p style=\"color: red;\">El nombre del extension no puede contener números</p>\n";
    } else {
        $extensionOK = true;
    }



    //Validacion de datos de la clave Dominio
if ($claveDom == "") {
    print "<p style=\"color: red;\">Introduce el nombre del clave Dominio</p>\n";
} elseif (strlen($claveDom) > 15) {
    print "<p style=\"color: red;\">El texto tiene más de 15 caracteres</p>\n";
    } elseif (preg_match('/\s/', $claveDom)) {
        print "<p style=\"color: red;\">El nombre del clave Dominio no puede contener espacios</p>\n";
    } elseif (!preg_match('/\d/', $claveDom)) {
        print "<p style=\"color: red;\">El nombre del clave Dominio no puede contener números</p>\n";
    } else {
        $claveDomOK = true;
    }


    
//$usuario $claveUS $cambio $tiposA $activar $admin $grupo $tiposG $seguro $unidad $crear $borrar






























/*
$nombre = recoge("");
$nombreOK = false;
$nombre = recoge("");
$nombreOK = false;
$nombre = recoge("");
$nombreOK = false;
*/







//header("location:index.html");







/*
primario o secundario
Tipo de dominio
nombre
extension 




dcpromo /unattend /InstallDns:yes /replicaOrNewDomain:domain /newDomain:forest /newDomainDnsName:santvicent.ies
/DomainNetbiosName:SANTVICENT /databasePath:”c:\ntds” /logPath:”c:\ntdslog” /sysvolpath:”C:\Windows\sysvol”
 /safeModeAdminPassword:1SOXservidor /rebootOnCompletion:yes







¿Reiniciar el sistema automáticamente cuando finalice el proceso? (si o no):





Ejem: simulacro
Programa: Nombre del dominio:
Usuario: proyecto
Programa: Extensión del dominio
Usuario: com
Programa: Contraseña del dominio:
Usuario: Ba66age
Programa: ¿Reiniciar el sistema automáticamente cuando finalice el proceso? (si o no):
Usuario: si
*/
?>