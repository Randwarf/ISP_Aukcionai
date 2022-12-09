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
	<?php include("header.php");?>



		
        <div class="container-fluid" style="width:99%">
			<div class="row" >
				<div class="col-10 p-3" style="background-color: #2b2d33;color:white;">
					<h2 >Aukcionai:</h2>
				</div>
				<div class="col-2 p-3" style="background-color: #272730;color:white;">
					<h2 >Kategorijos</h2>
				</div>
			</div>
            <div class="row">
              <div class="col-10 p-3">
				<div class="content">
					<!--veina prekės kortele-->
					<div class="card" style="width: 18rem; border:1;">
						<img src="https://pienozvaigzdes.lt/lt/1090-large_default/dvaro-pienas-25-riebumo-1l.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<a class="card-title" href="Aukciono_langas.php">Sugižęs pienas</a>
							<p class="card-text">Negaliu švaistyti maisto laisva ranka...</p>
						</div>
					</div>
					<!--veina prekės kortele-->
					<div class="card" style="width: 18rem; border:1;">
						<img src="https://i.guim.co.uk/img/static/sys-images/Guardian/Pix/pictures/2014/4/9/1397037075399/Piece-of-burnt-toast-011.jpg?width=465&quality=85&dpr=1&s=none" class="card-img-top" alt="...">
						<div class="card-body">
							<a class="card-title" href="Aukciono_langas.php">Sudegęs skrebutis</a>
							<p class="card-text">Negaliu švaistyti maisto laisva ranka...</p>
						</div>
					</div>
					<!--veina prekės kortele-->
					<div class="card" style="width: 18rem; border:1;">
						<img src="https://sekunde.lt/content/uploads/2021/07/ilgoji-parduotuve_sasyska_Foto-I-Stulgait%C4%97-Kriukien%C4%97.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<a class="card-title" href="Aukciono_langas.php">Sasyska</a>
							<p class="card-text">Negaliu švaistyti maisto laisva ranka...</p>
						</div>
					</div>
					<!--veina prekės kortele-->
					<div class="card" style="width: 18rem; border:1;">
						<img src="https://thumbs.dreamstime.com/z/horse-drawn-cart-hay-2630917.jpg" class="card-img-top" alt="...">
						<div class="card-body">
							<a class="card-title" href="Aukciono_langas.php">Lamborghini</a>
							<p class="card-text">Negaliu švaistyti maisto laisva ranka...</p>
						</div>
					</div>
				</div>


              </div>
              <div class="col-2 p-3">
			  	<div class='row'><a href='Aukcionu_saraso_langas.php'>Visi</a></div>
				<?php
                $db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);
                $query = "SELECT * FROM kategorija ORDER BY name ASC";
                $result = mysqli_query($db, $query);
				foreach ($result as $row){
	                echo "<div class='row'><a href='Aukcionu_saraso_langas.php?id=" .$row['id_KATEGORIJA']. "'>" .$row['name']. "</a></div>";
				}
				?>
              </div>
            </div>
          </div>
    </body>
</html>
