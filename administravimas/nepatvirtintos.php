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
    <?php include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");?>

        <h2>Nepatvirtintos prekės:</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>    
                    <th>Prekės pavadinimas</th>
                    <th>aprašymo ištrauka</th>
                    <th>kūrėjas</th>
                </tr>
            </thead>    
            <tbody>
                <?php

                $query = "SELECT * FROM aukcionas 
                          INNER JOIN preke ON preke.id_Preke=aukcionas.fk_Prekeid_Preke
                          INNER JOIN vartotojas ON preke.fk_Vartotojasid_Vartotojas=vartotojas.id_Vartotojas
                          WHERE statusas=3";

                $result = mysqli_query($db, $query);

                foreach ($result as $row){
                    echo "<tr>";
                    echo "<td><a href='/isp_aukcionai/pardavimas/Prekes_langas.php?id=".$row['id_Preke']."'>".$row['pavadinimas']."</a></td>";
                    echo "<td>". $row['aprasymas'] ."</td>";
                    echo "<th>" . $row['vardas'] . " " . $row['pavarde'] . "</th>";
                    echo "</tr>";
                }
                
                ?>
            </tbody>
        </table>
    </body>
</html>