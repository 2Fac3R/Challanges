<html>
<link rel="stylesheet" href="ctf.css" media="screen">

<head>
    <title> CTF HackxCrack 2012 - Comentarios </title>
</head>

<body>
<?php
error_reporting(0);
@include_once('conexion.php');
$id = $_GET['id'];
if(!isset($id)){
    $id = 1;
}
$query = mysql_query("SELECT * FROM comentarios WHERE id='$id'",$con) or die (mysql_error());
while($dat = mysql_fetch_array($query)){
    echo '<br><br>Autor: <b>'.$dat['Autor'].'<br>';
    echo 'Comentario</b><br>'.$dat['Mensaje'].'<br>';
}
?> <a href="ver.php?id=<?=$id+1?>"> Siguiente comentario </a> </body>

</html>