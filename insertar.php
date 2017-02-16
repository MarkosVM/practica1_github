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

       if($_POST){
           $database->insert("tb_personal",[
	"nombre" => $_POST["nombre"],
	"apellido" => $_POST["apellido"],
           "id_departamento"=> $_POST["departamento"]
           ]);
       } 

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
            
            <?php 
                $data = $database->select("tb_departamentos", "*");
                $len = count($data);
                for($i=0; $i<$len; $i++){
                    echo"<option value='".$data[$i]["id_departamento"]."'>".$data[$i]["departamento"]."</option>";                 }
                ?>
				
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
    </body>
</html>