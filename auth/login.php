<?php
session_start();


include("../db.php");

$korisnicko_ime = $_POST['korisnicko_ime'];
$lozinka = $_POST['lozinka'];

$sql = "SELECT * FROM korisnik 
WHERE korisnicko_ime='".$korisnicko_ime."' 
AND lozinka='".$lozinka."'";

$rezultat = mysqli_query($konekcija, $sql);
$row = mysqli_fetch_array($rezultat, MYSQLI_NUM);
if (mysqli_num_rows($rezultat) == 0) {
    print("Greška korisnik ne postoji u bazi.");
} else {
	$tip_korisnika=$row[1];
    print ("Uspješno ste prijavljeni na sustav.");
	if ($user_type == 0){
	$_SESSION['korisnicko_ime']= $korisnicko_ime;
	$_SESSION['lozinka'] = $lozinka;
	$_SESSION['tip_korisnika'] = $tip_korisnika;
	
	header("Location: ../index.php?view=filmovi"); }
	elseif ($tip_korisnika == 1) {
		$_SESSION['korisnicko_ime']= $korisnicko_ime;
		$_SESSION['lozinka'] = $lozinka;
		$_SESSION['tip_korisnika'] = $tip_korisnika;
		
		header("Location: ../index.php?view=admin"); }
		
	else {
		header("Location: ../index.php?view=welcome");
	}
	}
mysqli_close($konekcija);