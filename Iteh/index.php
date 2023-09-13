<!DOCTYPE html>

<?php
include("db.php");
include("knjiga.php");
$order = '';

$db = new MysqliDb('localhost', 'root', '', 'biblioteka');
if (isset($_GET['sort'])) {
    if ($_GET['sort'] === 'ascend') {

        $order = ' order by naslov asc';
    } else {
        if ($_GET['sort'] === 'descend') {
            $order = ' order by naslov desc';
        }
    }
}

$knjige = $db->rawQuery('SELECT knjiga.id, naslov, zanr, godina_izdavanja, ime, prezime FROM knjiga JOIN autor ON knjiga.id_autor = autor.id ' . $order);
?>



<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Biblioteka</title>
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
            <h1 class="display-4">Biblioteka</h1>
            <p class="lead">"Toliko mnogo knjiga, toliko malo vremena" (Frenk Zapa)</p>
          </div>
        </div>
        
        
        <div id="sort" class="btn-group" role="group" aria-label="Basic example">
            <a href="index.php?sort=ascend" class="btn btn-secondary">Rastuće</a>
            <a href="index.php?sort=descend" class="btn btn-secondary">Opadajuće</a>            
        </div>



        <table class="table table-hover" >
            <thead>
                <tr>
                    <th>Naslov</th>
                    <th>Žanr</th>
                    <th>Godina izdavanja</th>
                    <th>Autor</th>
                    <th>Opcije</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($knjige as $knjiga):
                    ?>
                    <tr>
                        <td><?php echo $knjiga['naslov']; ?></td>
                        <td><?php echo $knjiga['zanr']; ?></td>
                        <td><?php echo $knjiga['godina_izdavanja']; ?></td>
                        <td><?php echo $knjiga['ime'] . ' ' . $knjiga['prezime']; ?></td>
                        <td>
                            <a href="brisanje-knjige.php?id=<?php echo $knjiga['id'] ?>"> <i class="fas fa-trash-alt"></i></a>
                            <a href="izmena-knjige.php?id=<?php echo $knjiga['id'] ?>"> <i class="fas fa-edit"></i></a>
                        </td>
                    </tr>

                <?php endforeach; ?> 

            </tbody>
        </table>

        <a href="dodavanje-knjiga.php" class="btn btn-info add-btn">Dodaj knjigu</a>

        <footer>
            <a href="#" class="nav nav-pills btn btn-info back-to-top">Povratak na vrh</a>
        </footer>
        


    </body>
</html>