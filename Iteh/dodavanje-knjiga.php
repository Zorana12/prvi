<!DOCTYPE html>

<?php
include("db.php");
include("knjiga.php");

$db = new MysqliDb('localhost', 'root', '', 'biblioteka');
$autor = $db->get('autor');
$poruka = '';

if (isset($_POST['dodaj'])) {

    $naslov = $_POST['naslov'];
    $zanr = $_POST['zanr'];
    $godina_izdavanja = $_POST['godina_izdavanja'];
    $autor = $_POST['autor'];


    $data = Array(
        "naslov" => $naslov,
        "zanr" => $zanr,
        "godina_izdavanja" => $godina_izdavanja,
        "id_autor" => $autor,
    );

    $knjiga = new Knjiga();

    $knjiga->ubaciKnjige($data, $db);

    $poruka = $knjiga->getPoruka();
    
    header("Location:index.php");
}

?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Biblioteka - Dodavanje knjiga</title>
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
                    <li class="nav-item">
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
            <h1 class="display-4">Dodajte novu knjigu</h1>
            <p class="lead">"Toliko mnogo knjiga, toliko malo vremena" (Frenk Zapa)</p>
          </div>
        </div>



        <div class="container">
            <form class="form-horizontal" method="post" action="" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="naslov">Naslov:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="naslov" id="naslov" placeholder="Unesite naslov knjige">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="zanr">Žanr:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="zanr" id="zanr" placeholder="Unesite žanr knjige">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="godinaIzdavanja">Godina izdavanja:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="godina_izdavanja" id="godinaIzdavanja" placeholder="Unesite godinu izdavanja">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="drzava">Autor:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="autor" id="autor">
                            <option disabled selected value> -- Odaberite autora -- </option>
                            <?php foreach ($autor as $a): ?>
                                <option value="<?php echo $a['id']; ?>"><?php echo $a['ime'] . ' ' .  $a['prezime'];  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" id="dodaj" name="dodaj" class="btn add-btn">Dodaj</button>
                    </div>
                </div>
            </form>
        </div>


    </body>
</html>