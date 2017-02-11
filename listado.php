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
    $data = $database->select("tb_personal", "*");
    //$data = $database->select("tb_departamento", "*");
?>


<html>
    <head>
        <title>LISTADO</title>
    </head>
    
    <body>
        
        <style>
            body{
                background-color: darkslategrey;
                font-family: Arial;
                font-size: 25px;
            }
        </style>
        
        <ul>
            <?php
            
            $len = count($data);
            for($i=0; $i<$len; $i++){
                echo "<li>".$data[$i]["nombre"]." ".$data[$i]["apellido"]." "./*$data[$i]["departamento"].*/"</li>";
            }
            
            ?>
        </ul>
        
    </body>
</html>