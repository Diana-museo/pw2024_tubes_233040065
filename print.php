<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$movies = query("SELECT * FROM movies");

$mpdf = new \Mpdf\Mpdf();

$html = '<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard Movies</title>
        
        <!-- CUSTOM CSS ON MY OWN -->
        <link rel="stylesheet" href="assets/css/print.css">
    </head>

    <body>
        <div class="navbar-logo">CODEFLEX</div>
        <table class="table table-striped table-bordered" id="con-table">
            <thead class="table-dark">
                <tr class="row">
                    <th scope="col">Id</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Actors</th>
                    <th scope="col">Synopsis</th>
                </tr>
            </thead>';

$i = 1;
foreach ($movies as $mvs) {
    $html .= '<tbody class="table-group-divider">
                <tr>
                    <th scope="row">' . $i++ . '</td>
                    <td><img src="assets/img/' . $mvs["poster"] . '" width="100"></td>
                    <td>' . $mvs["title"] . '</td>
                    <td>' . $mvs["genre"] . '</td>
                    <td>' . $mvs["actor"] . '</td>
                    <td>' . $mvs["synopsis"] . '</td>
                </tr>
             </tbody>';
}

$html .= '</table>
    </body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('Movies-List.pdf', \Mpdf\Output\Destination::DOWNLOAD);

?>