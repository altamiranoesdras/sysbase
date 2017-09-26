<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 16/04/2017
 * Time: 2:57 PM
 */
use Carbon\Carbon;

/**
 * Cambia el formato de una fecha d/m/Y a Y-m-d
 * @param null $fecha
 * @param string $separador el de la fecha introducida
 * @param string $divisor el de la fecha a devolver
 * @return null|string
 */
function fechaDb($fecha=NULL, $separador='/', $divisor="-"){

    if(is_null($fecha))
        return NULL;

    $tmp=explode("$separador",$fecha);

    return $tmp[2].$divisor.$tmp[1].$divisor.$tmp[0];
}

/**
 * Cambia el formato de una fecha Y-m-d a d/m/Y
 * @param null $fecha
 * @param string $separador el de la fecha introducida
 * @param string $divisor el de la fecha a devolver
 * @return null|string
 */
function fecha($fecha=NULL, $separador='-', $divisor="/"){

    if(is_null($fecha))
        return NULL;

    $tmp=explode("$separador",$fecha);

    return $tmp[2].$divisor.$tmp[1].$divisor.$tmp[0];
}

/**
 * Devuelve la fecha de hoy en formato 'America/Guatemala' 'd/m/Y'
 * @return string
 */
function hoy(){

    return \Carbon\Carbon::now('America/Guatemala')->format('d/m/Y');
}

/**
 * Devuelve la fecha de hoy en formato 'America/Guatemala' 'Y-m-d' para guardar en la base de datos
 * @return string
 */
function hoyDb(){

    return \Carbon\Carbon::now('America/Guatemala')->format('Y-m-d');
}


function diasMes($anio=0,$mes=0){

    if(!$mes && !$anio)
        return false;

    return cal_days_in_month ( CAL_GREGORIAN , $mes , $anio );

}

function diasMesActual(){

    $fechaActual= hoy();

    list($dia,$mes,$anio)=explode('/',$fechaActual);

    return diasMes($anio,$mes);

}

function mesLetras($mes=0){
    if($mes==0)
        return 'mes invalido';

    $meses=['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];

    return $meses[$mes+1];
}

function arrayDias(){
    $dias=['domingo','lunes','martes','miércoles','jueves','viernes','sábado','domingo',];

    return $dias;
}

function diaLetras($dia=NULL){
    if(is_null($dia))
        return 'día invalido';

    $dias=arrayDias();

    return $dias[$dia];
}


/**
 * Devuelve la fecha y hora actual en el formato necesario para guardar en la base de datos (Y-m-d h:m:s)
 * @return string
 */
function fechaHoraActualDb(){
    return Carbon::now()->toDateTimeString();
}

/**
 * Devuelve la fecha y hora actual en formato 'd/m/Y H:m:s'
 * @return string
 */
function fechaHoraActual(){

    return Carbon::now()->format('d/m/Y H:i:s');
}

/**
 * Elimina los ceros decimales de un numero
 * @return string
 */
function noCerosDecimales($numero){

    list($entero,$decimal)=explode('.',$numero);

    return ($decimal>0) ? $numero : $entero;
}

/**
 * Convierte un archivo a su valor binario
 * @param $file
 * @return mixed
 */
function fileToBinary($file){
    return $file->openFile()->fread($file->getSize());
}

/**
 * Devuelve el src para etiqueta <img> en base a imágenes binarias
 * @param $img
 * @return string
 */
function srcImgBynary($img){
    return "data:".$img->type.";base64,".base64_encode($img->data);
}

/**
 * Format bytes to kb, mb, gb, tb
 *
 * @param  integer $size
 * @param  integer $precision
 * @return integer
 */
function formatBytes($size, $precision = 2)
{
    if ($size > 0) {
        $size = (int) $size;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    } else {
        return $size;
    }
}

function diasEntreFechas($fini,$ffin){
    $datetime1 = new DateTime($fini);
    $datetime2 = new DateTime($ffin);
    $interval = $datetime1->diff($datetime2);

//    return $interval->format('%R%a');
    return $interval->format('%a');
}

function fechaExpiraLicencia(){
    $licencia = \App\Models\Licencia::first();

    return is_null($licencia) ? null : $licencia->fecha_expira;
}

function diasRestanteLicencia(){

    return diasEntreFechas(hoyDb(),fechaExpiraLicencia());
}

function licenciaEsPrueba(){
    $licencia = \App\Models\Licencia::first();

    return is_null($licencia) ? false : $licencia->prueba;
}