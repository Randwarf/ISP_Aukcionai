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

    <?php include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");?>
        <h2>Žinutės</h2>
        <?php
        $query = "SELECT * FROM zinute
                        left JOIN vartotojas ON zinute.fk_Vartotojasid_Vartotojas=vartotojas.id_Vartotojas
                        left JOIN aukcionas ON zinute.fk_Aukcionasid_Aukcionas=aukcionas.id_Aukcionas
                        left JOIN preke ON aukcionas.fk_Prekeid_Preke=preke.id_Preke
                        WHERE preke.fk_Vartotojasid_Vartotojas=" . $_SESSION['userid']."
                        ORDER BY laiko_zyme desc";

            ?>
            <table class="table">
            <thead class="thead-dark">
                <tr>    
                    <th style="width: 5px;">Prekės pavadinimas</th>
                    <th style="width: 10px;">Žinutė</th>
                    <th style="width: 10px;">Siuntėjas</th>
                </tr>
            </thead>
            <tbody>
            
            <?php

            $result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) <= 0){
	            echo "<tr>
                        <td style='width: 5px;'> DEJA ŽINUČIŲ NĖRA </td>
                    </tr>";
			}


            

            foreach ($result as $item){
            echo "<tr>
                    <td style='width: 5px;'>".$item['pavadinimas'] ."</td>
                    <td style='width: 10px;'>".$item['tekstas'] ."</td>
                    <td style='width: 10px;'>".$item['vardas'] ."</td>
                </tr>";
            }   ?>
            
            </tbody>
            </table>
    </body>
</html>
