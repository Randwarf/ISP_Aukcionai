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
    * {
    box-sizing: border-box;
    }

    /* Create three equal columns that floats next to each other */
    .column {
    float: left;
    width: 50%;
    padding-left: 10px;
    padding-right: 10px;
    }

    /* Clear floats after the columns */
    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    </style>
      </head>

    <body>
    <?php include("header.php");?>
        <div class="container">
            <div class="container">
                <form method="post" action="">
                  <div class="col-12 card card-body bg-light p-4">
                      <div class="row"> 
                        <div class="col-4">
                            <h3>Mokėjimo duomenys</h3>
                            <br><label for="card_number"><i class="fa fa-user"></i>Kortelės numeris</label><br>
                                <input type="text" name="card_number" placeholder="0000111144443333"><br><br>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Kortelės galiojimo data</label><br>
                                <div class="row" style=" padding-left: 5px;">
                                    <div class="column" style="max-width:100px">
                                    <input style="max-width:100px" type="number" name="expiration_year" min="<?php echo date("Y"); ?>" max="<?php echo date("Y")+10; ?>" placeholder="<?php echo date("Y"); ?>"><br><br>
                                    </div>
                                    <div class="column"  style="max-width:100px" >
                                    <input  style="max-width:100px" type="number" name="expiration_month" min="1" max="12" placeholder="<?php echo date("n"); ?>"><br><br>
                                    </div>
                                </div>
                            <label for="card_cvc"><i class="fa fa-institution"></i>CVC</label><br>
                                <input type="number" min="100" max="999" name="card_cvc" placeholder="601"><br><br>
                            <button type="submit" name="update_card_details">Išsaugoti</button>
                        </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>

        <?php
            if(isset($_POST['update_card_details'])){
                $card_number = $_POST['card_number'];
                $expiration_year = $_POST['expiration_year'];
                $expiration_month = $_POST['expiration_month'];
                $card_cvc = $_POST['card_cvc'];
                $user_id = $_SESSION['userid'];

                $sql = "SELECT * FROM `kortele` WHERE kortele.fk_Vartotojasid_Vartotojas = '".$user_id."'";
                $result = mysqli_query($db, $sql);
                //nera korteles duomenu
                if(mysqli_num_rows($result) < 1) 
		        {
                    $sql = "INSERT INTO `kortele` (`korteles_nr`,`galiojimo_metai`,`galiojimo_menuo`,`cvc`,`fk_Vartotojasid_Vartotojas`) VALUES ('".$card_number."','".$expiration_year."','".$expiration_month."','".$card_cvc."','".$user_id."')";
                    if (!mysqli_query($db, $sql))  die ("Klaida įrašant:" .mysqli_error($db));
                }
                //yra korteles duomenys
                else 
                {
                    $sql = "UPDATE `kortele` SET kortele.korteles_nr = '".$card_number."', kortele.galiojimo_metai = '".$expiration_year."', 
                            kortele.galiojimo_menuo = '".$expiration_month."', kortele.cvc = '".$card_cvc."' where kortele.fk_Vartotojasid_Vartotojas = '".$user_id."'";
                    if (!mysqli_query($db, $sql))  die ("Klaida įrašant:" .mysqli_error($db));
                }
                mysqli_close($db);
                header('Location: Mokejimo_duomenu_redagavimo_puslapis.php');
        }
    ?>
    </body>
</html>