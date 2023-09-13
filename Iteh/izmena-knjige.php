<!DOCTYPE html>

<?php
include("db.php");
include("knjiga.php");
$id = $_GET['id'];

$db = new MysqliDb('localhost', 'root', '', 'biblioteka');

$knjiga = $db->rawQuery('SELECT * FROM knjiga LEFT JOIN autor ON knjiga.id_autor = autor.id WHERE knjiga.id = ' . $id);


$autor = $db->get('autor');
$poruka = '';

if (isset($_POST['dodaj'])) {

    $naslov = $_POST['naslov'];
    $zanr = $_POST['zanr'];
    $godinaIzdavanja = $_POST['godinaIzdavanja'];
    $id_a = $_POST['autor'];

    $params = Array($naslov, $zanr, $godinaIzdavanja, $id_a, $id);
    $db->rawQuery("UPDATE knjiga SET naslov=?,zanr=?,godina_izdavanja=?, id_autor=? WHERE id=?", $params);
    header("Location:index.php");
}
?>

<html lang="en">
    <head>
        <title>Izmena knjige</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="logo">
                </a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Početna <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ajaxpretraga.php">Pretraga po autoru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pretraga-po-naslovu.php">Pretraga po naslovu</a>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Izmena knjige</h1>
            <p class="lead">"Toliko mnogo knjiga, toliko malo vremena" (Frenk Zapa)</p>
          </div>
        </div>

            <div class="container">
                <form class="form-horizontal" method="post" action="" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="naslov">Naslov knjige:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="naslov" id="naslov" value="<?php echo $knjiga[0]['naslov']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="zanr">Žanr:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="zanr" id="zanr" value="<?php echo $knjiga[0]['zanr']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="godinaIzdavanja">Godina izdavanja:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="godinaIzdavanja" id="godinaIzdavanja" value="<?php echo $knjiga[0]['godina_izdavanja']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="autor">Autor:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="autor" id="autor">                                                           
                                <option value="<?php echo $knjiga[0]['id_autor']; ?>"><?php echo $knjiga[0]['ime'] . ' '. $knjiga[0]['prezime']; ?></option>
                                
                                <?php foreach ($autor as $a): ?>
                                    <option value="<?php echo $a['id']; ?>"><?php echo $a['ime']. ' ' . $a['prezime']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" id="dodaj" name="dodaj" class="btn add-btn">Izmeni</button>
                        </div>
                    </div>
                </form>
            </div>

        </body>
    </html>