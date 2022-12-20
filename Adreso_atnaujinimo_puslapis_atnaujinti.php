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
      <div class="container">
        <?php
        if(isset($_POST['update_address'])){
            echo "asgard";
            $country = $_POST['country'];
            $street = $_POST['street'];
            $house_number = $_POST['house_number'];
            $apartment_number = $_POST['apartment_number'];
            $zip_code = $_POST['zip_code'];
            $user_id = $_SESSION['userid'];

            $sql = "SELECT * FROM `adresas` WHERE adresas.fk_Vartotojasid_Vartotojas = '".$user_id."'";
            $result = mysqli_query($db, $sql);
            //nera adreso duomenu
            if(mysqli_num_rows($result) < 1) 
            {
                $sql = "INSERT INTO `adresas` (`salis`,`gatve`,`namo_nr`,`pasto_kodas`,`buto_nr`,`fk_Miestasid_Miestas`,`fk_Vartotojasid_Vartotojas`)
                VALUES ('".$country."','".$street."','".$house_number."','".$zip_code."','".$apartment_number."','22','".$user_id."')";
                if (!mysqli_query($db, $sql))  die ("Klaida įrašant:" .mysqli_error($db));
            }
            //yra adreso duomenys
            else 
            {
                $sql = "UPDATE `adresas` SET adresas.salis = '".$country."', adresas.gatve = '".$street."', adresas.namo_nr = '".$house_number."', 
                        adresas.pasto_kodas = '".$zip_code."', adresas.buto_nr = '".$apartment_number."' where adresas.fk_Vartotojasid_Vartotojas = '".$user_id."'";
                if (!mysqli_query($db, $sql))  die ("Klaida įrašant:" .mysqli_error($db));
            }
            mysqli_close($db);
            //echo '<script>window.location.reload();</script>';
            header('Location: Adreso_atnaujinimo_puslapis.php');
        }
      ?>
      </div>
      
    </body>
</html>