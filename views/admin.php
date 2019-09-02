<div id="bg">
  <img src="movietheater.jpg" alt="">
</div>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background-color: black;">
<img src="popcorn.jpg" style="width:30px;height:30px;">
  <a class="navbar-brand" href="index.php?view=welcome">Cinema Apex</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>

        <ul class="navbar-nav">
			<li class="nav-item">
					<a class="nav-link active" href="index.php?view=filmovi" >Objave</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#" >Rezervacije</a>
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

<br><br><br>

<div class="container-fluid" style="color: white; padding-top: 15px;">
    <div class="row">
        <div class="col-sm-4 text-center" style="width:800px; margin:0 auto;">
            <form method="POST" enctype="multipart/form-data" action="index.php?posts=<?php if (isset($edit_post)){?>edit&id=<?=$edit_post['id']?><?php } else {?>new<?php } ?>">

                <div class="form-group">
                    <label for="naziv_filma">Naziv fimla:</label>
                    <div class="input-group">
                        <input type="text" value="<?php if(isset($edit_post)) print($edit_post['naziv_filma']);?>" name="naziv_filma" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="zanr">Žanr:</label>
                    <textarea name="zanr" class="form-control"><?php if(isset($edit_post)) print($edit_post['zanr']);?></textarea>
                </div>
				
                <div class="form-group">
                    <label for="opis_filma">Opis filma:</label>
                    <textarea name="opis_filma" class="form-control"><?php if(isset($edit_post)) print($edit_post['opis_filma']);?></textarea>
                </div>
				
                <div class="form-group">
                    <label for="glumci">Glumci:</label>
                    <textarea name="glumci" class="form-control"><?php if(isset($edit_post)) print($edit_post['glumci']);?></textarea>
                </div>
				
                <div class="form-group">
                    <label for="slika">Izaberite sliku:</label>
                    <input type="file" name="slika" id="slika" value="<?php if(isset($edit_post)) print($edit_post['slika']);?>">
                    <input type="hidden" class="btn btn-primary" name="submit">
                </div> 
				
                <div class="form-group">
                    <button class="btn btn-secondary" type="submit" name="objava">
                        <?php if (isset($edit_post)){ ?>Uredi objavu<?php } else { ?>Dodaj objavu<?php }?>
                    </button>
                </div>
				
            </form>
        </div>


        <div class="col-sm-12">
	        <div class="table-responsive">
                <table class="table table-striped" style="color: white; background-color: rgba(0,0,0,0.7);">
                    <tr>
                        <td>Id</td>
                        <td>Naziv filma</td>
                        <td>Žanr</td>
                        <td>Opis filma</td>
                        <td>Glumci</td>
                        <td>Slika</td>
                        <td>Datum</td>
                        <td>Autor</td>
                        <td>Akcije</td>
                    </tr>
                        <?php foreach ($posts as $post) { ?>
                    <tr>
                        <td><?php print($post['post_id']); ?></td>
                        <td><?php print($post['naziv_filma']); ?></td>
                        <td><?php print($post['zanr']); ?></td>
                        <td><?php print($post['opis_filma']); ?></td>
                        <td><?php print($post['glumci']); ?></td>
                        <td>
                            <img src="images/<?php print($post['slika']);  ?>" height="200" width="200" class="img-thumbnail">
                            
                        </td>
                        <td><?php print($post['datum']); ?></td>
                        <td><?php print($post['ime']. " " .$post['prezime']); ?></td>
                        <td>
                            <a class="btn btn-danger btn-sm"
                            href="index.php?posts=delete&id=<?php print($post['post_id']); ?>">Pobriši</a>
                            <a class="btn btn-default btn-sm"
                            href="index.php?posts=edit&id=<?php print($post['post_id']); ?>">Uredi</a>
                        </td>
                    </tr>
                            
                    
                        <?php } ?>
                </table>
		    </div>
        </div>
    </div>
</div>