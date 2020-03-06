<?php
//ese usuario es de prueba (50 peticiones gratuitas). o puedes crear un usuario: https://conectame.ddns.net/consola/login.php
$usuario = 'prueba';
$contrasenia = 'sC%7D9pW1Q%5Dc';
$valor = 'GME050203KW9'; //reemplazar por el curp a consultar
$metodo = 'rfc';
$url = 'https://conectame.ddns.net/rest/api.php?m='.$metodo.'&user='.$usuario.'&pass='.$contrasenia.'&val='.$valor;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_respuesta = curl_exec($curl);
if ($curl_respuesta === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('Ocurrio un error: ' . var_export($info));
}
curl_close($curl);
$resultado = json_decode($curl_respuesta);
print("<pre>".print_r($resultado,true)."</pre>");
die();

/* RESPUESTA
	stdClass Object
(
    [Rfc] => GME050203KW9
    [TipoPersona] => M
    [Lrfc] => 1
    [Sncf] => 0
    [Subcontratacion] => 0
    [Lco] => 1
    [ValidezObligaciones] => 1
    [Cer] => Array
        (
            [0] => stdClass Object
                (
                    [EstatusCertificado] => A
                    [noCertificado] => 00001000000301923760
                    [FechaFinal] => 2017-12-19 21:51:11
                    [FechaInicio] => 2013-12-19 21:51:11
                )

            [1] => stdClass Object
                (
                    [EstatusCertificado] => A
                    [noCertificado] => 00001000000408249149
                    [FechaFinal] => 2021-11-23 20:25:23
                    [FechaInicio] => 2017-11-23 20:25:23
                )

            [2] => stdClass Object
                (
                    [EstatusCertificado] => A
                    [noCertificado] => 00001000000502669325
                    [FechaFinal] => 2024-01-08 21:29:50
                    [FechaInicio] => 2020-01-08 21:29:50
                )

        )

    [RazonSocial] => GOOGLE MEXICO S DE RL DE CV
    [RfcRepresentante] => GOVG721013A45
    [CurpRepresentante] => GOVG721013MDFNRD09
    [Respuesta] => correcto
)
*/
