<html>

<head>
    <title> CTF HackxCrack 2012 </title>
    <link rel="stylesheet" href="ctf.css" media="screen"> </head>

<body>
    <?php

error_reporting(0);  //sin notificacion 

/*
 * CTF HackxCrack 2012 By 2Fac3R
 *
 *     Modificado por mrobles                                                 
 */

/* ~~~~~~ INICIO PARCHE ~~~~~~ */

//Nos permiter parchear las entradas usando la nueva funcion pache()

function parche($string) 
{
$search = array('&','<','>','""');
$replace = array('&amp;','&lt;','&gt;','&quot;',);
return str_replace($search, $replace, $string); 
}

/*~~~~~~  FIN PARCHE ~~~~~~  */




$arch = 'comentarios.txt';
if($_GET['opc']=='ver'){
    echo file_exists($arch) ? die(include_once($arch)) : '<script>alert("No hay comentarios anteriores");window.location="ctf_b.php"</script>';
}
$autor = parche($_POST['autor']);          //parche
$msj = parche($_POST['mensaje']);          //parche
?>
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
            <input type="text" name="autor" class="transparente">
            <br> Mensaje:
            <br>
            <textarea name="mensaje" cols="100" rows="10" class="transparente"></textarea>
            <br>
            <input type="submit" name="send" value="Enviar!">
            <input type="reset" value="Borrar">
            <button type="button" onclick="javascript:window.location='ctf_b.php?opc=ver'">Ver opiniones anteriores</button>
        </form>
        <br>
        <?
if(!empty($msj)&&($autor)){
$file = fopen($arch,"a+");
$comentario = <<<com
    <br><br>
    Autor: <b>$autor</b> <br>
    <b>Comentario</b>:<br>$msj
    <br><br>
com;
    echo fwrite($file,$comentario) ? "<script>alert('Comentario enviado correctamente');window.location='ctf_b.php?opc=ver'</script>" : "<script>alert('No se ha podido crear el archivo de comentarios')</script>";
}else{
    echo isset($_POST['send']) ? '<script>alert("Debes ingresar ambos campos")</script>':NULL;
}
?>
            <!-- By 2Fac3R -->
</body>

</html>