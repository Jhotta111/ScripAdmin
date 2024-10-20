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

// $ip $mascara $gateway $primario $secudario $dominio $extension $claveDom $reiniciar $usuario $claveUS $cambio $tiposA $activar $admin $grupo $tiposG $seguro $unidad $crear $borrar


    //Validacion de datos de la red
    if ($equipo == "") {
        print "<p style=\"color: red;\">Ladirección IP del equipo no puede estacío</p>\n";
    } elseif (strlen($equipo) > 15) {
        print "<p style=\"color: red;\">El texto tiene más de 15 caracteres</p>\n";
        } elseif (preg_match('/\s/', $equipo)) {
            print "<p style=\"color: red;\">El nombre del equipo no puede contener espacios</p>\n";
        } elseif (!preg_match('/\d/', $equipo)) {
            print "<p style=\"color: red;\">El nombre del equipo no puede contener números</p>\n";
        } else {
            $equipoOK = true;
        }

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