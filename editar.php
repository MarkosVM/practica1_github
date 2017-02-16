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

        if($_GET){
            $query = $database->select(
                "tb_personal",
                "*", [
                "id_personal" => $_GET["id"]
                ]);
        }


       if($_POST){
           $database->update("tb_personal",[
	"nombre" => $_POST["nombre"],
	"apellido" => $_POST["apellido"],
           "id_departamento"=> $_POST["departamento"]],
               [
                 "id_personal" => $_POST["id"]  
               
           ]);
       header("location:listado.php");//Redirecciona a una pagina
       } 

?>


<html>
    <head>
        <title>EDITAR</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <h1>ACTUALIZACION DE DATOS</h1>
       
    <form action="editar.php" method="post">
        
        <table>    
    <tr>
        <td align="right">Nombre</td>
            <td align="left">
                <input name="nombre" type="text" maxlength="32" value="<?php echo $query[0]["nombre"];?>"/>
					</td>
    </tr>
    
    <tr>
        <td align="right">Apellido</td>
            <td align="left">
                <input name="apellido" type="text" maxlength="32" value="<?php echo $query[0]["apellido"];?>"/>
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
                
                if($data[$i]["id_departamento"] == $query[0]["id_departamento"]){
                    echo"<option value='".$data[$i]["id_departamento"]."'selected>".$data[$i]["departamento"]."</option>";
                }else{
                    echo"<option value='".$data[$i]["id_departamento"]."'>".$data[$i]["departamento"]."</option>";
                }    
                }
                ?>
				
            </select>
        </td>
            </tr>
            
        <tr>
            <td colspan="2" align="center">
                <input type="hidden" name="id" value="<?php echo $query[0]["id_personal"]; ?>">
				<input type="submit" value="ACTUALIZAR" id="register"/>
            </td>
        </tr>    
        </table>
    </form>
    </body>
</html>