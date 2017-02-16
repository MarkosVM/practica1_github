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
?>


<html>
    <head>
        <title>LISTADO</title>
    </head>
    
    <body>
        
        <style>
            body{
                background-color:black;
                font-family: Arial;
                font-size: 25px;
                color: aliceblue;
            }
            a{
                text-decoration: none;
                color:darkred;
                background-color:darkseagreen;
                padding: 3px;
                border-radius: 8px;
                transition: 0.5s;
                font-size: 14px;
            }
            a:hover{
                background: red;
                color: #FFF;
                transition: 0.5s;
            }
        </style>
        
        <ul>
            <?php
            
            $len = count($data);
            for($i=0; $i<$len; $i++){
                echo "<li>".$data[$i]["nombre"]." ".$data[$i]["apellido"]." ".$data[$i]["id_departamento"]."<a href='editar.php?id=".$data[$i]["id_personal"]."'>Editar</a> <a href='eliminar.php?id=".$data[$i]["id_personal"]."'>Eliminar</a></li>";
            }
            
            ?>
        </ul>
        
    </body>
</html>