<?php
require  'medoo.php';
 
$database = new medoo([
	'database_type' => 'mysql',
	'database_name' => 'empresa',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
]);
 /*
$database->insert("tb_personal", [
	"nombre" => "foo",
	"apellido" => "foo@bar.com",
    "departamento" => "depto"
]);*/

?>


<html>
    <head>
        <title>Insertar</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <h1>PAGINA DE REGISTRO WEB</h1>
       
    <form action="insertar.php" method="post">
        
        <table>    
    <tr>
        <td align="right">Nombre</td>
            <td align="left">
                <input name="nombre" type="text" maxlength="32"/>
					</td>
    </tr>
    
    <tr>
        <td align="right">Apellido</td>
            <td align="left">
                <input name="apellido" type="text" maxlength="32"/>
					</td>
    </tr>
            
    <tr>
        <td align="right">Departamento</td>
        <td align="left">
            <select name="departamento">
				<option >Ingenieria Informatica</option>
				<option >Derecho</option>
				<option >Recursos Humanos</option>
				<option >Medicina</option>
				<option >Administracion</option>
            </select>
        </td>
            </tr>
            
        <tr>
            <td colspan="2" align="center">
				<input type="submit" value="REGISTRAR" id="register"/>
            </td>
        </tr>
        <a href="listado.php" align="center">USER LIST</a>
        
        </table>
    </form>
    <?php
       if($_POST){
           $database->insert("tb_personal",[
	"nombre" => $_POST["nombre"],
	"apellido" => $_POST["apellido"]]);
           $database->insert("tb_departamento", ["departamento" => $_POST["departamento"]]);
       } 

        ?>
    </body>
</html>