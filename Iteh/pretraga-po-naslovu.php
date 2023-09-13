<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pretraga knjiga po naslovu</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/sugerisi.js"></script> 
        <script type="text/javascript">
            function place(ele) {
                document.getElementById('txt').value = ele.innerHTML;
                document.getElementById("livesearch").style.display = "none";
                document.getElementById('search').innerHTML = `
                    <button type="button" class="btn srch-btn" onclick="detalji()">Prikaži detalje</button>
                `;
            }
        </script>
    </head>
    <body onload="document.getElementById('txt').focus()">



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
                    <li class="nav-item active">
                        <a class="nav-link" href="pretraga-po-naslovu.php">Pretraga po naslovu</a>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Pretraga knjiga po naslovu</h1>
                <p class="lead">"Toliko mnogo knjiga, toliko malo vremena" (Frenk Zapa)</p>
            </div>
        </div>


        <script>

            function detalji() {
                var pretraga = $("#txt").val();

                $.ajax({url: "pretraga-naslov.php", data: "id=" + pretraga, success: function (result) {

                        var detalji = JSON.parse(result);

                        var nalepi = `
                            <div class="list-group">
                              <p class="list-group-item list-group-item-action active">Naslov: ` + detalji.naslov + `</p>
                              <p class="list-group-item list-group-item-action">Žanr: ` + detalji.zanr + `</p>
                              <p class="list-group-item list-group-item-action">Godina izdavanja: ` + detalji.godina_izdavanja +`</p>
                              <p class="list-group-item list-group-item-action">Autor: `+ detalji.ime + ` ` + detalji.prezime + `</p>
                            </div>                                   
                            `;

                        $('#output').html(nalepi);

                    }});
            }
        </script>



        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form class="srch-by-title">
                        <label class="control-label" for="godinaIzdavanja">Pretražite knjige:</label>
                        <input type="text" id="txt" size="32" onkeyup="sugestija(this.value)" class="form-control"> 
                        <div id="livesearch"></div>
                        <div class="search" id="search"></div>
                    </form>
                    
                    <div id="output" class="srch-output"></div>
                </div>
            </div>                       
        </div>

    </body>

</html>


