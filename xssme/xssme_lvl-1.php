<?php
/*
Author: 2Fac3R
Date: Abril 09, 2012
Title: [Reto] XSSme Lv.1
Site: HackxCrack

Objetivo:
Mostrar en pantalla un alert de forma string
por ejemplo: alert("Reto") 
no vale mostrar alert de forma numerica.

*/
$reto = $_GET['nombre'];
if(isset($reto) && !empty($reto)){
        if(!preg_match("/script|\"|'/",$reto)){
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
?>