<?php
	include ("views/static/header.php");
?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: black;">
    <img src="popcorn.jpg" style="width:30px;height:30px;"/>
    <a class="navbar-brand" href="index.php?view=welcome">Cinema Apex</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<br><br><br><br><br><br><br><br>


<div class="container-fluid" id="slikaPozadina" >
	
	<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
	<?php
		if (isset($_POST['submit-search'])) {
			$search = mysqli_real_escape_string($konekcija, $_POST['search']);
			$sql = "SELECT o.id as post_id, naziv_filma, zanr, opis_filma, glumci, slika
					FROM objave o, korisnik k
					WHERE o.user_id=k.id AND naziv_filma LIKE '%$search%'";
			$rezultat = mysqli_query($konekcija, $sql);
			$queryRezultat = mysqli_num_rows($rezultat);
			
			if ($queryRezultat > 0) {
				while ($row = mysqli_fetch_assoc($rezultat)) {
					echo "<div class='card flex-row flex-wrap' style='background-color:  #ffffff;'>
				<div class='col-sm-3'>
				<div class='card-header border-0'>
					<img src='images/".$row['slika']."' height='200' width='200' class='img-thumbnail'>
				</div>
				</div>
				<div class='col-sm-8'>
				<div class='card-block px-2'>
					<h4 class='card-title'>".$row['naziv_filma']."</h4>
					<hr>
					<p class='card-text'>".$row['zanr']."</p>
					<p class='card-text'>".$row['opis_filma']."</p>
					<p class='card-text'>".$row['glumci']."</p>
				</div>
				</div>
				</div>";
				}
			}else {
				echo"<div class='container-fluid' style='text-align: center; font-family: Quicksand; color:white; font-size: 35px;'>

					Unijeli ste nepostojeći film!

					</div>";
			}
		}
	?>
	</div>
	<div class="col-sm-2">
	</div>
	</div>
</div>