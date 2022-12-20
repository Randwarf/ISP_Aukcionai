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



		
        <div class="container-fluid" style="width:99%">
			<div class="row" >
				<div class="col-10 p-3" style="background-color: #2b2d33;color:white;">
					<h2 >Naujausi aukcionai:</h2>
				</div>
				<div class="col-2 p-3" style="background-color: #272730;color:white;">
					<h2 >Kategorijos</h2>
				</div>
			</div>
            <div class="row">
              <div class="col-10 p-3">
				<div class="content">

					<?php

					$db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);
					$query = "SELECT *, preke.pavadinimas as pavadinimas
							  FROM preke
							  INNER JOIN aukcionas ON preke.id_Preke=aukcionas.fk_Prekeid_Preke
							  LEFT JOIN nuotrauka ON preke.id_Preke=nuotrauka.fk_Prekeid_Preke
							  WHERE aukcionas.statusas=4
							  ORDER BY data desc
							  LIMIT 5";

					$result = mysqli_query($db, $query);
					foreach ($result as $item){
						echo "<div class='card' style='width: 18rem; border:1;'>
							  <img src='" . $item['nuoroda'] . "' class='card-img-top' alt='...'>
							  <div class='card-body'>
		                      <h5 class='card-title'>". $item['pavadinimas']."</h5>
		                      <p class='card-text'>".$item['aprasymas']."</p>
		                      <a href='/isp_aukcionai/pirkimas/Aukciono_langas.php?id=".$item['id_Aukcionas']."' class='btn btn-primary'>Peržiūrėti</a>
	                          </div>
                              </div>";
}
					?>
				</div>


              </div>
              <div class="col-2 p-3">
			  	<div class='row'><a href='/isp_aukcionai/pirkimas/Aukcionu_saraso_langas.php'>Visi</a></div>
				<?php
                $db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);
                $query = "SELECT * FROM kategorija ORDER BY name ASC";
                $result = mysqli_query($db, $query);
				foreach ($result as $row){
	                echo "<div class='row'><a href='/isp_aukcionai/pirkimas/Aukcionu_saraso_langas.php?id=" .$row['id_KATEGORIJA']. "'>" .$row['name']. "</a></div>";
				}
				?>
              </div>
            </div>
          </div>
    </body>
</html>
