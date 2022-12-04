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
      </head>

    <body>
    <?php include("header.php");?>
        <h2>Istorija</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>    
                    <th style="width: 5px;">Prekės pavadinimas</th>
                    <th style="width: 10px;">Suma</th>
                    <th style="width: 10px;">Statusas</th>
                </tr>
            </thead>    
            <tbody>
                <tr>
                    <td style="width: 5px;">Sugižęs pienas</td>
                    <td style="width: 10px;">150,00€</td>
                    <td style="width: 10px;">Nesumokėta</td>
                </tr>
                <tr>
                    <td style="width: 5px;">Lamborghini</td>
                    <td style="width: 10px;">20,00€</td>
                    <td style="width: 10px;">Įvykdytas</td>
                </tr>
            </tbody>
            </table>
    </body>
</html>