<!DOCTYPE html>
<html>
   <head>
        <title>Prekių sąrašas</title>
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
		
        <h2 style="background-color: #2b2d33;color:white;  padding:10px">Visos prekės:</h2>

		
		<div class="content">

			<div class="card" style="width: 18rem; border:1;">
				<img src="https://i.guim.co.uk/img/static/sys-images/Guardian/Pix/pictures/2014/4/9/1397037075399/Piece-of-burnt-toast-011.jpg?width=465&quality=85&dpr=1&s=none" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">NAUJA PREKĖ!</h5>
					<p class="card-text">PRADĖK SAVO AUKCIONŲ KARJERĄ</p>
					<a href="Prekes_sukurimo_langas.php" class="btn btn-primary">KURTI</a>
				</div>
			</div>

			<!--veina prekės kortele-->
			<div class="card" style="width: 18rem; border:1;">
				<img src="https://i.guim.co.uk/img/static/sys-images/Guardian/Pix/pictures/2014/4/9/1397037075399/Piece-of-burnt-toast-011.jpg?width=465&quality=85&dpr=1&s=none" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Sudegusi duonos riekelė</h5>
					<p class="card-text">Negaliu švaistyti maisto laisva ranka...</p>
					<a href="Prekes_redagavimo_langas.php" class="btn btn-primary">Redaguoti</a>
				</div>
			</div>
			
			<!--veina prekės kortele-->
			<div class="card" style="width: 18rem; border:1;">
				<img src="https://i.guim.co.uk/img/static/sys-images/Guardian/Pix/pictures/2014/4/9/1397037075399/Piece-of-burnt-toast-011.jpg?width=465&quality=85&dpr=1&s=none" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title">Sudegusi duonos riekelė</h5>
					<p class="card-text">Negaliu švaistyti maisto laisva ranka...</p>
					<a href="Prekes_redagavimo_langas.php" class="btn btn-primary">Redaguoti</a>
				</div>
			</div>
		</div>
</body>
</html>