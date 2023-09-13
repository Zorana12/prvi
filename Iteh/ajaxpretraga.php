<!DOCTYPE html>
<?php
include("db.php");
$db = new MysqliDb('localhost', 'root', '', 'biblioteka');
$autor = $db->get('autor');
?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pretraga knjiga po autoru</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>

    <script>

        function pronadji() {

            var pretraga = $("#autor").val();
            $.ajax({url: "pretraga.php", data: "id=" + pretraga, success: function (result) {
                    //alert(result)
                    var nalepi = `<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Naslov</th>
                                <th>Zanr</th>
                                <th>Godina izdavanja</th>
                                <th>Autor</th>
                            </tr>
                        </thead>
                        <tbody>`;
                    $.each(JSON.parse(result), function (i, val) {
                        nalepi += '<tr>';
                        nalepi += '<td>' + val.naslov + '</td>';
                        nalepi += '<td>' + val.zanr + '</td>';
                        nalepi += '<td>' + val.godina_izdavanja + '</td>';
                        nalepi += '<td>' + val.ime + ' ' + val.prezime + '</td>';
                        nalepi += '</tr>';

                    });

                    nalepi += '</tbody></table>';
                    //alert(nalepi);
                    $('#output').html(nalepi);
                }});
        }



    </script>

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
                <li class="nav-item active">
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
        <h1 class="display-4">Pretraga knjiga po autoru</h1>
        <p class="lead">"Toliko mnogo knjiga, toliko malo vremena" (Frenk Zapa)</p>
      </div>
    </div>
    
    
    <div class="container">
        <div class="form-group">
            <label class="control-label col-sm-2" for="autor">Autor:</label>
            <div class="col-sm-10">
                <select class="form-control" name="autor" id="autor">
                    <option disabled selected value> -- Odaberite autora -- </option>
                    <?php foreach ($autor as $a): ?>
                        <option value="<?php echo $a['id']; ?>"><?php echo $a['ime'] . ' ' . $a['prezime']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn find-btn" onclick="pronadji()">Pronađi</button>
            </div>
        </div>
    </div>
    <div id="output"></div> 


    <footer>
        <a href="#" class="nav nav-pills btn btn-info back-to-top">Povratak na vrh</a>
    </footer>

</body>
</html>