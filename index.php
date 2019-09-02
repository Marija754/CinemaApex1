<?php
session_start();

include ("db.php");
include ("utils.php");

$view = "login";

if (isset($_GET['view'])) {
    $view = $_GET['view'];
}

$params = array();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php?view=welcome");
}

if (isset($_SESSION['korisnicko_ime']) &&
	isset ($_SESSION['lozinka'])) {
		include("models/user.php");
		
		if ($_SESSION['tip_korisnika']==0){
		$user = get_user_login (
			$_SESSION['korisnicko_ime'],
			$_SESSION['lozinka'], $konekcija
		);
		$view = "filmovi"; 
		$params =array('user' => $user);}
		elseif ($_SESSION['tip_korisnika']==1){
			$user = get_user_login (
			$_SESSION['korisnicko_ime'],
			$_SESSION['lozinka'], $konekcija
		);
			$view = "admin";
			$params = array('user' => $user); }
		}

include("models/post.php");

$target_dir = "images/";
$target_file = !empty($_FILES['slika']['name']) ? $target_dir . basename($_FILES['slika']['name']) : false;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Provjeri je li prava slika ili ne
if(isset($_POST['submit'])) {
    $check = getimagesize($_FILES['slika']['tmp_name']);
    if($check !== false) {
        echo "File je slika - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File nije slika.";
        $uploadOk = 0;
    }
// Provjeri je li slika postoji
if (file_exists($target_file)) {
    echo "File već postoji.";
    $uploadOk = 0;
}
// Provjeri veličinu
if ($_FILES['slika']['size'] > 500000) {
    echo "File je prevelik.";
    $uploadOk = 0;
}
// provjeri formate
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Samo JPG, JPEG, PNG & GIF files su dozvoljeni.";
    $uploadOk = 0;
}
// provjeri je li uploadOk nula
if ($uploadOk == 0) {
    echo "Vaš file nije uploadan.";
} else {
	if (move_uploaded_file($_FILES['slika']['tmp_name'], $target_file)) {
			echo "Slika ". basename( $_FILES['slika']['name']). " je uploadana.";
    } 	else {
			echo "Dogodila se greška prilikom uploadanja.";
    }
}
}


if (isset($_GET['posts'])) {
    if ($_GET['posts'] == 'new') {
        $naziv_filma = $_POST['naziv_filma'];
        $zanr = $_POST['zanr'];
        $opis_filma = $_POST['opis_filma'];
        $glumci = $_POST['glumci'];
        $slika = $_FILES['slika']['name'];
        add_post($naziv_filma, $zanr, $opis_filma, $glumci, $slika, $user['id'], $konekcija);
    }

    if ($_GET['posts'] == 'delete') {
        $id = $_GET['id'];
        delete_post($id, $konekcija);
    }

    if ($_GET['posts'] == 'edit') {
        $id = $_GET['id'];
        $edit_post = get_post($id, $konekcija);
        if (isset($_POST['objava'])) {
            edit_post($id, $_POST['naziv_filma'], $_POST['zanr'], $_POST['opis_filma'], $_POST['glumci'],$_FILES['slika']['name'], $user['id'], $konekcija);
        }
        $params['edit_post'] = $edit_post;
    }

}
$params['posts'] = get_posts($konekcija);

load_view("views/static/header.php", array("title" => "Cinema Apex"));
load_view("views/$view.php", $params);
load_view("views/static/footer.php");

//dodano za korpicu

if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["korpica"]))  
      {  
           $item_array_id = array_column($_SESSION["korpica"], "id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["korpica"]);  
                $item_array = array(  
                     'id'               =>     $_GET["id"],  
                     'naziv_filma'               =>     $_POST["hidden_name"],    
                );  
                $_SESSION["korpica"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Uspješna rezervacija!")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'id'               =>     $_GET["id"],  
                'naziv_filma'               =>     $_POST["hidden_name"],  
           );  
           $_SESSION["korpica"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["korpica"] as $keys => $values)  
           {  
                if($values["filmovi_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["korpica"][$keys]);  
                     echo '<script>alert("Rezervacija je obrisana!")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  
 