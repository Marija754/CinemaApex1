<?php
function add_post($naziv_filma, $zanr, $opis_filma, $glumci, $slika, $user_id, $konekcija) {
    $sql = "INSERT INTO objave VALUES(null, '".$naziv_filma."', '".$zanr."',
    '".$opis_filma."','".$glumci."','".$slika."',   NOW(), ".$user_id.");";
    return mysqli_query($konekcija, $sql);
}

function get_posts ($konekcija) {
    $posts = array ();
    $sql = "SELECT o.id as post_id, naziv_filma, zanr, opis_filma, glumci, slika, datum, ime, prezime 
    FROM objave o, korisnik k WHERE o.user_id=k.id";
    $result = mysqli_query($konekcija, $sql);
    while ($post = mysqli_fetch_assoc($result)) {
        array_push($posts, $post);
    }
    return $posts;
}

function delete_post ($id, $konekcija) {
    $sql = "DELETE FROM objave WHERE id=".$id;
    return mysqli_query($konekcija, $sql);
}

function get_post ($id, $konekcija) {
    $sql = "SELECT * FROM objave WHERE id=".$id;
    $result = mysqli_query($konekcija, $sql);
    return mysqli_fetch_assoc($result);
}

function edit_post ($id, $naziv_filma, $zanr, $opis_filma, $glumci, $slika, $user_id, $konekcija) {
    $sql = "UPDATE objave SET 
    naziv_filma='".$naziv_filma."', zanr='".$zanr."', opis_filma='".$opis_filma."', glumci='".$glumci."', slika='".$slika."', user_id=".$user_id.", datum=NOW() WHERE id=".$id;
    return mysqli_query($konekcija, $sql);
}