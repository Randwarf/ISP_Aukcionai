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
    <?php 
    include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");
    
    $query = "SELECT * FROM vartotojas WHERE id_Vartotojas=" . $_GET['id'];
    $result = mysqli_query($db, $query);
    $CURRINFO = mysqli_fetch_assoc($result);
    ?>

        <div style="margin:auto;max-width:800px">
            <a href="/isp_aukcionai/naudotojoPuslapis.php">ATGAL</a>
            <form method='post' action='blokuoti.php'>
                <input type='hidden' name='id' value=<?php echo $_GET['id'];?>></input>
                <table class="table center">
                    <tr>
                        <td>Naudotojas:</td>
                        <?php
                            echo "<td>".$CURRINFO['vardas'] . " " . $CURRINFO['pavarde']."</td>";
                        ?>
                    </tr>
                    <tr>
                        <td>Blokavimo priežastis</td>
                        <td>
                            <textarea name="reason"> </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right"><button type="submit" class="btn btn-danger">BLOKUOTI</button></td>
                    </tr>
                </table>
            </form>
        </div>

    </body>
</html>