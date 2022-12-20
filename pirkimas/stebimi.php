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
	    .content{
		    display: flex;
		    flex-wrap: wrap;
		    margin: 10px;
		    padding: 10px;
	    }
	
	
	    </style>
      </head>

    <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/isp_aukcionai/include/header.php");?>

        <h2 style="background-color: #2b2d33;color:white;  padding:10px">Stebimi aukcionai:</h2>

        <div class="content">
			<?php
            $query = "SELECT * 
					FROM stebi
					LEFT JOIN vartotojas ON stebi.fk_Vartotojasid_Vartotojas=vartotojas.id_Vartotojas
                    LEFT JOIN aukcionas ON stebi.fk_Aukcionasid_Aukcionas=aukcionas.id_Aukcionas
                    LEFT JOIN preke ON preke.id_Preke=aukcionas.fk_Prekeid_Preke
                    LEFT JOIN nuotrauka ON nuotrauka.fk_Prekeid_Preke=preke.id_Preke
					WHERE stebi.fk_Vartotojasid_Vartotojas=" . $_SESSION['userid'];

            $result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) <= 0){
	            echo "Stebimu aukcionu nėra";
			}
            foreach ($result as $item){
	            echo "<div class='card' style='width: 18rem; border:1;'>
				<img src='/isp_aukcionai/" . $item['nuoroda'] . "' class='card-img-top' alt='...'>
				<div class='card-body'>
					<h5 class='card-title'>". $item['pavadinimas']."</h5>
					<p class='card-text'>".$item['aprasymas']."</p>
					<a style='width=45%' href='Aukciono_langas.php?id=".$item['id_Aukcionas']."' class='btn btn-primary'>Peržiūrėti</a>
                    <a style='width=45%' href='istrinti_stebima.php?id=".$item['id_Aukcionas']."' class='btn btn-primary'>Ištrinti</a>
				</div>
			</div>";
			}
			
			?>
    </body>
</html>