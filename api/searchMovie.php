<?php
include "info.php";
$ca = curl_init();
curl_setopt($ca, CURLOPT_URL, "https://api.themoviedb.org/3/search/".$channel."?api_key=61c0103b14a03568c640608163352579&query=".$search);
curl_setopt($ca, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ca, CURLOPT_HEADER, FALSE);
curl_setopt($ca, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response9 = curl_exec($ca);
curl_close($ca);
$search  = json_decode($response9);

?>





