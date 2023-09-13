<?php

$id = $_GET['id'];

$mysqli = new mysqli('localhost', 'root', '', 'biblioteka');
if ($mysqli->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");



$sql = "SELECT * FROM knjiga JOIN autor ON knjiga.id_autor = autor.id WHERE naslov LIKE '$id%'";
$rezultat = $mysqli->query($sql);
if ($rezultat->num_rows == 0) {
    echo "U bazi ne postoji knjiga " . $id;
} else {
    $red = $rezultat->fetch_object();
    echo(json_encode($red));
}
$mysqli->close();
?>