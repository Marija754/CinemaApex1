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

								<li class="nav-item active">
									<a class="nav-link" href="?view=welcome" >Filmovi <span class="sr-only">(current)</span></a>
								</li>

								<li class="nav-item">
									<a class="nav-link" href="?view=rezervacije" >Moje rezervacije</a>
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
		
		<!--prikaz filmova-->

        <div class="row content">
            <div class="col-2"></div>
                <div class="col-8" style="background-color: rgb(0, 0, 0, 0); padding-top: 15px;">
                
                    <?php foreach ($posts as $post) { ?>
					
                    <div class="card flex-row flex-wrap" style="background-color: rgb(0, 0, 0, 0.7);">
                        <div class="col-sm-4">
							<div class="card-header border-0">
								<img src="images/<?php print($post['slika']);  ?>" height="240" width="240">
							</div>
                        </div>

                        <div class="col-sm-8">
							<div class="card-block px-2" style="color:white">
								<h4 class="card-title"><?php print($post['naziv_filma']); ?></h4>
								<hr class="new1">
								<p class="card-text"><?php print($post['zanr']); ?></p>
								<p class="card-text"><?php print($post['opis_filma']); ?></p>
								<p class="card-text"><?php print($post['glumci']); ?></p>
								
							</div>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Rezerviraj</button>
                        </div>

							<!-- Rezervacija -->
							<div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Rezervacija</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<!--datum-->	
								<input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime">
									<script type="text/javascript">
										$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
									</script>
								<!--kraj datuma-->

								<br><br>

								<input type="text" name="user"/>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
									<button type="button" class="btn btn-primary">Rezerviraj</button>
								</div>
								</div>
							</div>
							</div>

                    </div>
						
                        <br>
						
                    <?php } ?>
                        <br>
                </div>
            <div class="col-2"></div>
        </div>
</div>

