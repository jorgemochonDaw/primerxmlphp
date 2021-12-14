<?php
$datosXML = simplexml_load_file('empleados.xml');
echo "<br>";
if($datos === false) {
    echo 'Error al leer el fichero';
}

foreach($datosXML as $v) {
    print_r($v);
    echo '<br>';
}

echo '<br>';

$datosXPTATH = simplexml_load_file('empleados.xml');
$edades = $datosXPTATH->xpath("//edad");

foreach($datosXPTATH as $p) {
    print_r($p);
    echo '<br>';
}


$dept = new DOMDocument();
$dept->load('empleados.xml');
$res = $dept->schemaValidate('empleados.xsd');
if($res) {
    echo 'valido';
} else {
    echo 'no valido';
}

$dept2 = new DOMDocument();
$dept2->load('empleados.xml');
$transformacion = new DOMDocument();
$transformacion->load('departamento.xslt');
$procesador = new XSLTProcessor();
$procesador->importStylesheet($transformacion);
$f= $procesador->transformToXml($dept2);
echo $f;