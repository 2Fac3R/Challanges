<html>

<head>
    <title> CTF HackxCrack 2012 </title>
    <link rel="stylesheet" href="ctf.css" media="screen"> </head>

<body>
<?php
/*
Author: 2Fac3R
Date: Mayo 24, 2012
Title: CTF s2 HackxCrack 2012
Site: HackxCrack
*/
error_reporting(0);
@include_once('conexion.php');
$autor = htmlentities($_POST['autor']);
$msj = htmlentities($_POST['mensaje'])?>
        <h1> CTF HackxCrack 2012 </h1>
        <table border="0" cellpadding="10">
            <tr>
                <th> WhiteTeam </th>
                <th> NullTeam </th>
                <th> BlackTeam </th>
            </tr>
            <tr>
                <td> Kid_goth </td>
                <td> #RemoteExecution </td>
                <td> mrobles </td>
            </tr>
        </table>
        <p> Escribe tu opini&oacute;n sobre los wargames:</p>
        <br>
        <form action="" method="POST"> Autor:
            <input type="text" name="autor" class="mensaje">
            <br> Mensaje:
            <br>
            <textarea name="mensaje" cols="100" rows="10" class="mensaje"></textarea>
            <br>
            <input type="submit" name="send" value="Enviar!">
            <input type="reset" value="Borrar">
            <button type="button" onclick="javascript:window.location='ver.php'">Ver opiniones anteriores</button>
        </form>
        <br>
        <?php
if(!empty($msj)&&($autor)){
    $query = mysql_query("INSERT INTO comentarios(Autor,Mensaje) VALUES('$autor','$msj')",$con);
echo $query ? "<script>alert('Comentario enviado correctamente');window.location='ver.php?id=1'</script>" : "<script>alert('No se ha podido enviar el comentario')</script>";
}else{
    echo isset($_POST['send']) ? '<script>alert("Debes ingresar ambos campos")</script>':NULL;
}
?>
            <!-- By 2Fac3R -->
</body>

</html>
