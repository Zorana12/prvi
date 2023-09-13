<?php

$mysqli = new mysqli('localhost','root','','biblioteka');
if ($mysqli->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");

if (!isset($_GET["unos"])) {
    echo "Parametar Unos nije prosleđen!";
} else {
    $pomocna = $_GET["unos"];
    $sql = "SELECT * FROM knjiga JOIN autor ON knjiga.id_autor = autor.id WHERE naslov LIKE '$pomocna%'ORDER BY naslov";
    $rezultat = $mysqli->query($sql);
    if ($rezultat->num_rows == 0) {
        echo "U bazi ne postoji knjiga koja počinje na " . $pomocna;
    } else {
        while ($red = $rezultat->fetch_object()) {
            ?>
            <a href="#" onclick="place(this)"><?php echo $red->naslov; ?></a>
            <br/>
            <?php
        }
    }
    $mysqli->close();
}
?>