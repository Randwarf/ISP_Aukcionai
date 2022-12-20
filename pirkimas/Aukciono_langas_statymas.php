<?php include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");?>
    <?php
    if(isset($_POST['submit_bid'])){
        $id = $_POST['auction_id'];
        $sql = "SELECT vartotojas.likutis as current_wallet_size FROM `vartotojas` WHERE vartotojas.id_Vartotojas = '".$_SESSION['userid']."'";
        $result = mysqli_query($db, $sql);
        if (!$result || (mysqli_num_rows($result) < 1)) 
        {
          echo "klaida, neišėjo gauti lėšų iš vartotojo paskyros";
          exit;
        }
        $row = mysqli_fetch_assoc($result);
        $current_wallet_size = $row['current_wallet_size'];
        $bid_size = $_POST['bid_size'];
        if($bid_size > $current_wallet_size)
        {
            header('Location: Aukciono_langas.php?id='.$id.'&bid_size=insufficient_funds');
            exit();
        }

        $sql = "UPDATE `aukcionas` SET aukcionas.galutine_kaina = '".$bid_size."' WHERE aukcionas.id_Aukcionas = '".$id."'";
        if (!mysqli_query($db, $sql))  die ("Klaida atnaujinant:" .mysqli_error($db));

        $sql = "INSERT INTO `statymas` (`verte`, `laiko_zyme`, `id_Statymas`, `fk_Vartotojasid_Vartotojas`, `fk_Aukcionasid_Aukcionas`) 
                VALUES ('".$bid_size."', current_timestamp(), NULL, '".$_SESSION['userid']."', '".$id."');";
                
        if (!mysqli_query($db, $sql))  die ("Klaida atnaujinant:" .mysqli_error($db));
        mysqli_close($db);
        header('Location: Aukciono_langas.php?id='.$id.'');
    }
  ?>