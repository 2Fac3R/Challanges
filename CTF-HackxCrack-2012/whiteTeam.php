<html>

<head>
    <title> CTF HackxCrack 2012 </title>
    <link rel="stylesheet" href="ctf.css" media="screen"> </head>

<body>
    <?php 
error_reporting(0); 
/*
 * Function para parchear el XSS 
 * Se lo aplicaremos directamente a las variables $autor y $msg 
 * El parche consiste en remplazar los caracteres < y > por 
 * sus entidades HTML, asi evitamos que se ejecute un XSS 
 * Le aplicamos el parche a las variales $msj y $autor 
**/ 
 
function Parche($str) 
{ 
    $search  = array('<','>'); 
    $replace = array('&lt;', '&gt;'); 
    return str_replace($search, $replace, $str); 
} 
 
/* 
 * CTF HackxCrack 2012 By 2Fac3R 
 *                                                 */ 
$arch = 'comentarios.txt'; 
if($_GET['opc']=='ver'){ 
    echo file_exists($arch) ? die(include_once($arch)) : '<script>alert("No hay comentarios anteriores");window.location="ctf_w.php"</script>'; 
} 
$autor = Parche($_POST['autor']); 
$msj = Parche($_POST['mensaje']);?>
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
            <button type="button" onclick="javascript:window.location='ctf_w.php?opc=ver'">Ver opiniones anteriores</button>
        </form>
        <br>
        <?php 
if(!empty($msj)&&($autor)){ 
$file = fopen($arch,"a+"); 
$comentario = <<<com 
    <br><br> 
    Autor: <b>$autor</b> <br> 
    <b>Comentario</b>:<br>$msj 
    <br><br> 
com; 
    echo fwrite($file,$comentario) ? "<script>alert('Comentario enviado correctamente');window.location='ctf_w.php?opc=ver'</script>" : "<script>alert('No se ha podido crear el archivo de comentarios')</script>"; 
}else{ 
    echo isset($_POST['send']) ? '<script>alert("Debes ingresar ambos campos")</script>':NULL; 
} 
?>
            <!-- By 2Fac3R -->
</body>

</html>