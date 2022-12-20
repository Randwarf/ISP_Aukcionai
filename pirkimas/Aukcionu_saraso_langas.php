<!DOCTYPE html>
<html>
   <head>
        <title>Aukcionų sąrašas</title>
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
		
        <h2 style="background-color: #2b2d33;color:white;  padding:10px">Aukcionai:</h2>

		<div class="content">
			<?php
			$db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);
			$kategorija = "kategorija";
			if (isset($_GET['id'])){
	            $kategorija = $_GET['id'];
			}

            $query = "SELECT *, preke.pavadinimas as prekespavadinimas, nuotrauka.pavadinimas as nereikia
					FROM preke
					INNER JOIN aukcionas ON preke.id_Preke=aukcionas.fk_Prekeid_Preke
					LEFT JOIN nuotrauka ON preke.id_Preke=nuotrauka.fk_Prekeid_Preke
					WHERE preke.kategorija=" . $kategorija . "
					AND aukcionas.statusas=4";

            $result = mysqli_query($db, $query);
			if (mysqli_num_rows($result) <= 0){
	            echo "DEJA PREKIŲ NĖRA";
			}
            foreach ($result as $item){
	            echo "<div class='card' style='width: 18rem; border:1;'>
				<img src='/isp_aukcionai/" . $item['nuoroda'] . "' class='card-img-top' alt='...'>
				<div class='card-body'>
					<h5 class='card-title'>". $item['prekespavadinimas']."</h5>
					<p class='card-text'>".$item['aprasymas']."</p>
					<a href='Aukciono_langas.php?id=".$item['id_Aukcionas']."' class='btn btn-primary'>Peržiūrėti</a>
				</div>
			</div>";
			}
			
			?>
</body>
</html>