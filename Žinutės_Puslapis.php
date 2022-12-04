<!DOCTYPE html>
<html>
    <head>
        <title>Pagrindinis Puslapis</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            table{
                table-layout: fixed;
            }
        </style>
    </head>

    <body>
    <?php include("header.php");?>
        <h2>Žinutės</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>    
                    <th style="width: 5px;">Prekės pavadinimas</th>
                    <th style="width: 10px;">Žinutė</th>
                    <th style="width: 10px;">Siuntėjas</th>
                </tr>
            </thead>    
            <tbody>
                <tr>
                    <td style="width: 5px;">Sugižęs pienas</td>
                    <td style="width: 10px;">Laba diena, ar jo galiojimo laikas dar nepasibaigęs?</td>
                    <td style="width: 10px;">Petras</td>
                </tr>
                <tr>
                    <td style="width: 5px;">Lamborghini</td>
                    <td style="width: 10px;">Sw, kiek arklio galių?</td>
                    <td style="width: 10px;">Jonas</td>
                </tr>
            </tbody>
            </table>
    </body>
</html>