<?php
include ("db.php");
$db= new MysqliDb('localhost','root','','biblioteka');

$id=$_GET['id'];
$db->where('id',$id);
$db->delete('knjiga');
header("Location:index.php");
 ?>