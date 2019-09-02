<?php
	include ("views/static/header.php");
 ?>

<div class="container-fluid">

	<div id="bg">
	  <img src="movietheater.jpg" alt="">
	</div>

		<div class="container"> 
			<div class="row">
			<div class="col"></div>
			<div class="col-9">
            <img src="cinema_apex.jpg" style="width:100%; height:200px;">
				<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
					<img src="popcorn.jpg" style="width:30px;height:30px;"/>
					<a class="navbar-brand" href="?view=welcome">Cinema Apex</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto"></ul>

						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="?view=welcome">Filmovi <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?view=register" >Registracija</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" href="?view=login">Prijava</a>
							</li>
						</ul>

					</div> 
				</nav>
			</div>
			<div class="col"></div>
			</div>
      </div>

			<!--pretraživač filmova-->
			
      <div class="wrap">
		   <div class="search">
				<form class="search" action="search.php" method="POST">
				<input type="text" name="search" class="searchTerm" placeholder="Pretražite filmove...">
				<button type="submit" name="submit-search" class="searchButton">
					<i class="fa fa-search"></i>
				</button>
				<form action="search.php" method="POST">
			</div>
		</div>

<br><br>

		<!--popis filmova-->

		<div class="container-fluid" id="slikaPozadina">
		<div class="row content">
		<div class="col-3"></div>
		<div class="col-6" style="background-color: rgba(0,0,0,0.7); color: #ddd9db; padding-top:20px;">
		<div class="row">
		<?php 
			$sql = "SELECT o.id as post_id, naziv_filma, slika
					FROM objave o, korisnik k
					WHERE o.user_id=k.id";
				$rezultat = mysqli_query($konekcija, $sql);
				$queryRezultat = mysqli_num_rows($rezultat);
				
				if ($queryRezultat > 0) {
					while ($row = mysqli_fetch_assoc($rezultat)) {
						echo "
            <div class='col-md-4'>
						<img src='images/".$row['slika']."' class='card-img-top'  weight='200px' height='200px'>
							<h4 class='card-text''>".$row['naziv_filma']."</h4>
							<br>
						</div>
							";
						}
					}
				
		?>
		</div>
		</div>
		<div class="col-3"></div>
		</div>
		</div>
		<br>

</div>



