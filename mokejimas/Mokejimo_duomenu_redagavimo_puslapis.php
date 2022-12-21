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
    <?php include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");?>
        <div class="container">
            <div class="container">
                
                  <div class="col-12 card card-body bg-light p-4">
                      <div class="row"> 
                        <div class="col-6">
                        <form method="post" action="">
                            <h3>Mokėjimo duomenys</h3>
                            <?php
                                $sql = "SELECT * FROM `kortele` WHERE kortele.fk_Vartotojasid_Vartotojas = '".$_SESSION['userid']."'";
                                $result_card_details = mysqli_query($db, $sql);
                                //nera adreso duomenu
                                if(mysqli_num_rows($result_card_details) < 1) 
                                {
                                    $card_no = 'ex. 0000 1111 2222 3333';
                                    $card_mo = date("n");
                                    $card_yr = substr(date("Y"), -2);
                                    $card_cv = 'ex. 601';
                                    $has_card = false;
                                }
                                else
                                {
                                    $row = mysqli_fetch_assoc($result_card_details);
                                    $card_no = $row['korteles_nr'];
                                    $card_mo = $row['galiojimo_menuo'];
                                    $card_yr = $row['galiojimo_metai'];
                                    $card_cv = $row['cvc'];
                                    $has_card = true;
                                }
                                
                            ?>
                            <br><label for="card_number"><i style="padding-right:3px" class="fa fa-user"></i>Kortelės numeris</label><br>
                                <input class="form-control col-8 creditCardText" type="text" name="card_number"  minlength="19"  maxlength="19" placeholder="<?php echo $card_no;?>" required><br>
                            <label for="adr"><i class="fa fa-address-card-o" style="padding-right:3px"></i> Kortelės galiojimo data (yy-mm)</label><br>
                                <div class="row" style=" padding-left: 5px;">
                                    <div class="column" style="max-width:100px">
                                    <input class="form-control" style="max-width:100px" type="number" name="expiration_year" required min="<?php echo substr(date("Y"), -2); ?>" max="<?php echo $card_yr+10; ?>" placeholder="<?php echo $card_yr; ?>"><br>
                                    </div>
                                    <div class="column"  style="max-width:100px" >
                                    <input class="form-control" style="max-width:100px" type="number" name="expiration_month" required min="1" max="12" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" placeholder="<?php echo $card_mo; ?>">
                                    </div>
                                </div>
                            <label for="card_cvc"><i style="padding-right:3px" class="fa fa-institution"></i>CVC</label><br>
                                <input class="form-control col-8" type="number" min="100" max="999" name="card_cvc" required placeholder="<?php echo $card_cv; ?>"><br>
                            <button type="submit" class="btn btn-secondary btn-sm" name="update_card_details">Išsaugoti</button>
                        </div>
                        </form>
                        
                        <div class="col-6">
                        <form method="post" action="">
                            <h3>Pinigų įsidėjimas</h3>
                            <br><label for="money_input"><i style="padding-right:3px" class="fa fa-user"></i>Pinigų kiekis</label><br>
                            <?php
                                $sql = "SELECT * FROM `vartotojas` WHERE vartotojas.id_Vartotojas = '".$_SESSION['userid']."'";
                                $result = mysqli_query($db, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $curent_piggybank = $row['likutis'];
                            ?>
                            <input class="form-control col-8" <?php if(!$has_card) {echo 'disabled';}?> type="text" name="money_input" required placeholder="Likutis: <?php echo $curent_piggybank;?>€"><br>
                            <button class="btn btn-secondary btn-sm" <?php if(!$has_card) {echo 'disabled';}?> type="submit" name="update_piggybank">Papildyti</button>
                            </form>
                        </div>
                    </div>
                  </div>
                
            </div>
        </div>

        <?php
            if(isset($_POST['update_card_details'])){
                $card_number = $_POST['card_number'];
                $card_number = str_replace(' ', '', $card_number);
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
                $page = $_SERVER['REQUEST_URI'];
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$page.'";';
                echo '</script>';
        }
    ?>
        <?php
                if(isset($_POST['update_piggybank'])){
                    $money_input = $_POST['money_input'];
                    $user_id = $_SESSION['userid'];

                    $sql = "UPDATE `vartotojas` SET vartotojas.likutis = vartotojas.likutis + '".$money_input."' WHERE vartotojas.id_Vartotojas = '".$_SESSION['userid']."'";
                    if (!mysqli_query($db, $sql))  die ("Klaida įrašant:" .mysqli_error($db));

                    mysqli_close($db);
                    $page = $_SERVER['REQUEST_URI'];
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="'.$page.'";';
                    echo '</script>';
            }
        ?>
        <script>
        $('.creditCardText').on('keyup', function() {
        var foo = $(this).val().split(" ").join(""); 
        if (foo.length > 0) {
            foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
        }
        $(this).val(foo);
        });
    </script>
    </body>
</html>