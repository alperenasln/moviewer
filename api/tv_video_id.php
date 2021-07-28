<?php
include "info.php";
$ca = curl_init();
curl_setopt($ca, CURLOPT_URL, "https://api.themoviedb.org/3/tv/".$id_tv."/videos?api_key=61c0103b14a03568c640608163352579");
curl_setopt($ca, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ca, CURLOPT_HEADER, FALSE);
curl_setopt($ca, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$response8 = curl_exec($ca);
curl_close($ca);
$tv_video_id = json_decode($response8);

?>






