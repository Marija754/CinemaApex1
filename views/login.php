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
                                <a class="nav-link" href="?view=welcome">Filmovi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?view=register" >Registracija</a>
                            </li>
                            
                            <li class="nav-item active">
                                <a class="nav-link" href="?view=login">Prijava<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>

                    </div> 
                </nav>
            </div>
            <div class="col"></div>
            </div>
        </div>

        <div class="row align-items-center h-100" style="padding-bottom:230px">
            <div class="col-md-6 offset-md-3" >
                <h2 style="color: white; text-align: center;">Prijava</h2>
                <hr />

                    <form method="POST" action="auth/login.php">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"></div>
                                <input id="okruglo" placeholder="Korisničko ime" type="text" name="korisnicko_ime" class="form-control" style="text-align:center;"/>
                            </div>
                        </div>
                
                        <div class="form-group">
                           <input id="okruglo" placeholder="Lozinka" type="password" name="lozinka" class="form-control" style="text-align:center;" />
                        </div>
                        

                        <div class="sredina">
                            <button id="okruglo" class="btn btn-light" type="submit" name="prijava">
                                <i class="fas fa-sign-in-alt"></i>
                                    Prijava
                            </button>
                        </div>
                    
                    </form>
            </div>
        </div>
</div>


