<div class="container-fluid">

	<div id="bg">
	  <img src="movietheater.jpg" alt="">
	</div>
	
		<div class="container"> 
				<div class="row">
				<div class="col"></div>
				<div class="col-9">
				<img src="cinema_apex.jpg" style="width:100%; height:200px">
					<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: black;">
						<img src="popcorn.jpg" style="width:30px;height:30px;"/>
						<a class="navbar-brand" href="?view=welcome">Cinema Apex</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto"></ul>

							<ul class="navbar-nav">

								<li class="nav-item">
									<a class="nav-link" href="?view=welcome" >Filmovi</a>
								</li>

								<li class="nav-item acitve">
									<a class="nav-link" href="?view=rezervacije" >Moje rezervacije <span class="sr-only">(current)</span></a>
								</li>

								<li class="nav-item dropdown" style="float:right;">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
										<?php print ($user['ime']. " " . $user['prezime']); ?>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="index.php?logout=logout">Odjava</a>
									</div>
								</li>
							</ul>

						</div> 
					</nav>
				</div>
				<div class="col"></div>
				</div>
		</div>

				<!--rezervacija-->
				