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
           $database->delete("tb_personal",
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
      
    <style>
        h2, p{   
            text-align: center;
            color: #FFF;
            width: 100%;
            padding: 0;
            margin: 20px 0 0 0;
            text-shadow:#dfdfdf 0 0 3px;
        }
        .bt-si-no{
            cursor: pointer;
            transition: 0.5s;
        }
        .bt-si-no:hover{
            transition: 0.5s;
            background-color: dimgray;
            color: aqua;
        }
        </style>
       <h1>ELIMINACION DE REGISTRO</h1>
       <form action="eliminar.php" method="post">
       
       <h2>¿Desea Eliminar El Registro?</h2>
       
       <p><?php echo $query[0]["nombre"]." ".$query[0]["apellido"]; ?></p>
       
       <input type="submit" class="bt-si-no" value="SI">
       <input type="button" class="bt-si-no" value="NO" onclick="history.back();">
       <input type="hidden" name="id" value="<?php echo $query[0]["id_personal"]; ?>">
    </form>
    </body>
</html>