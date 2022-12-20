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
                <?php
                    $sql = "SELECT preke.pavadinimas as 'auction_item_name', IFNULL(aukcionas.galutine_kaina, aukcionas.min) as 'auction_current_value', statusas.name as 'auction_status' FROM `aukcionas` 
                    INNER JOIN statusas
                    INNER JOIN preke
                    WHERE aukcionas.fk_Vartotojasid_Vartotojas = '1' AND statusas.id_STATUSAS = aukcionas.statusas AND preke.id_Preke = aukcionas.fk_Prekeid_Preke";

                    $result = mysqli_query($db, $sql);
                    if (!$result || (mysqli_num_rows($result) < 1))
                    {
                        echo "<tr>";
                            echo "<td style='width: 5px;'>-</td>" ;
                            echo "<td style='width: 10px;'>-</td>" ;
                            echo "<td style='width: 10px;'>-</td>" ;
                            echo "</tr>";
                    }
                    else
                    {
                        while($row = mysqli_fetch_assoc($result)) 
			            {
                            $auction_item_name = $row['auction_item_name'];
                            $auction_current_value = round($row['auction_current_value'],2);
                            $auction_status = $row['auction_status'];

                            echo "<tr>";
                            echo "<td style='width: 5px;'>".$auction_item_name."</td>" ;
                            echo "<td style='width: 10px;'>".$auction_current_value."€</td>" ;
                            echo "<td style='width: 10px;'>".$auction_status."</td>" ;
                            echo "</tr>";
                        }
                    }
                    mysqli_close($db);
                ?>
            </tbody>
            </table>
    </body>
</html>