<!DOCTYPE html>
<html>
   <head>
        <title>Mano Prekės</title>
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
		
        <h2 style="background-color: #2b2d33;color:white;  padding:10px">Mano prekės:</h2>
		<div>
			<form action="Prekes_sukurimo_langas.php">
                        <button class="btn btn-primary">Pridėti prekę</button>
            </form>
		</div>
		<div class="content">
			<?php
            $query = "SELECT preke.pavadinimas as name, nuotrauka.nuoroda, preke.aprasymas, preke.id_Preke, aukcionas.statusas, aukcionas.id_Aukcionas
					FROM preke
					LEFT JOIN nuotrauka ON preke.id_Preke=nuotrauka.fk_Prekeid_Preke
					LEFT JOIN aukcionas ON preke.id_Preke=aukcionas.fk_Prekeid_Preke
					WHERE preke.fk_Vartotojasid_Vartotojas=" . $_SESSION['userid'];

            $result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) <= 0){
	            echo "DEJA PREKIŲ NĖRA";
			}
            foreach ($result as $item){
	            echo "<div class='card' style='width: 18rem; border:1;'>
				<img src='/isp_aukcionai/" . $item['nuoroda'] . "' class='card-img-top' alt='...'>
				<div class='card-body'>
					<h5 class='card-title'>". $item['name']."</h5>
					<p class='card-text'>".$item['aprasymas']."</p>
					<a href='Prekes_langas.php?id=".$item['id_Preke']."' class='btn btn-primary'>Peržiūrėti</a>";
					if($item['statusas'] != NULL){
						echo "<a href='/isp_aukcionai/pirkimas/Aukciono_langas.php?id=".$item['id_Aukcionas']."' class='btn btn-primary' >Aukcionas</a>";
					}
					echo " 
				</div>
			</div>";
			}
			
			?>
</body>
</html>