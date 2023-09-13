<?php

$id = $_GET['id'];
include("db.php");
$db= new MysqliDb('localhost','root','','biblioteka');


$knjige=$db->rawQuery('select * from knjiga join autor on knjiga.id_autor = autor.id where autor.id = '.$id);

echo(json_encode($knjige));


 ?>