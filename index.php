<?php


require_once("config.php");


$sql = new Sql();

$users = $sql->select("select * from tb_usuarios");


echo json_encode($users);



?>