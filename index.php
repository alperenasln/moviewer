<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Moviewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <!--<script type="text/javascript" src="js/jquery-func.js"></script>-->
    <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="shell">
    <div id="header">
        <h1 id="logo"><a href="/moviewer/index.php">Moviewer</a></h1>
        <div class="social"> <span>FOLLOW US ON:</span>
            <ul>
                <li><a class="twitter" href="#">twitter</a></li>
                <li><a class="facebook" href="#">facebook</a></li>
                <li><a class="vimeo" href="#">vimeo</a></li>
                <li><a class="rss" href="#">rss</a></li>
            </ul>
        </div>
        <div id="navigation">
            <ul>
                <li><a class="active" href="/moviewer/index.php">HOME</a></li>
                <li><a href="#">NEWS</a></li>
                <li><a href="#">IN THEATERS</a></li>
                <li><a href="#">COMING SOON</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><a href="#">ADVERTISE</a></li>
            </ul>
        </div>
        <div id="sub-navigation">
            <ul>
                <li><a href="#">SHOW ALL</a></li>
                <li><a href="#">LATEST TRAILERS</a></li>
                <li><a href="#">TOP RATED</a></li>
                <li><a href="#">MOST COMMENTED</a></li>
            </ul>
            <div id="search">
                <form action="search.php" method="get" accept-charset="utf-8">
                    <label >SEARCH</label>
                    <input type="text" name="search" placeholder="Enter search here"  class="blink search-field"/>
                    <select name="channel" required>
                        <option value="multi" selected="selected">All</option>
                        <option value="movie" >Movie</option>
                        <option value="tv" >TV Show</option>
                    </select>
                    <input type="submit" value="GO!" class="search-button" />
                </form>
            </div>
        </div>
    </div>
    <div id="main">
        <div id="content">

            <div class="box">
                <div class="head">
                    <h2>TOP RATED</h2>
                    <p class="text-right">&nbsp;</p>
                </div>
                <div class="container">
                <?php
                include_once "api/topRated.php";
                $i=0;
                foreach ($topRated->results as $p) {
                    echo'
                        <div class="movie" >
                            <div class="movie-image" > <span class="play" ><span class="name" >'. $p->original_title.'</span ></span > <a href ="movie.php?id='.$p->id.'" ><img src = "https://image.tmdb.org/t/p/w500'.$p->poster_path.'" alt = "" /></a > </div >
                            <div class="rating" >
                                <p > RATING</p>                                
                                <div class="stars" >
                                    <div class="stars-in" style="width:'. $p->vote_average * 6 .'px "> </div >
                                </div >
                                <span class="comments" > '.$p->vote_count.'</span > </div >
                        </div >
                        ';
                    if(++$i==12) break;
                    }
                ?>
                </div>
            </div>
            <div class="box">
                <div class="head">
                    <h2>Now Playing</h2>
                    <p class="text-right">&nbsp;</p>
                </div>
                <div class="container">
                    <?php
                    include_once "api/nowPlaying.php";
                    $i=0;
                    foreach ($nowPlaying->results as $p) {
                        echo'
                        <div class="movie" >
                            <div class="movie-image" > <span class="play" ><span class="name" >'. $p->original_title.'</span ></span > <a href = "movie.php?id='.$p->id.'" ><img src = "https://image.tmdb.org/t/p/w500'.$p->poster_path.'" alt = "" /></a > </div >
                            <div class="rating" >
                                <p > RATING</p>                                
                                <div class="stars" >
                                    <div class="stars-in" style="width:'. $p->vote_average * 6 .'px "> </div >
                                </div >
                                <span class="comments" > '.$p->vote_count.'</span > </div >
                        </div >
                        ';
                        if(++$i==12) break;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="coming">
            <div class="head">
                <h3>COMING SOON<strong>!</strong></h3>
                <p class="text-right">&nbsp;</p>
            </div>
            <?php
            include_once "api/upcoming.php";
            $i=0;
            foreach($upcoming->results as $p){
                echo' 
                <div class="content">
                    <h4>'.$p->original_title.' </h4>
                    <a href="movie.php?id='.$p->id.'"><img src="https://image.tmdb.org/t/p/w500'.$p->poster_path.'" alt="" /></a>
                    <p>'.$p->overview.'</p>
                    <a href="movie.php?id='.$p->id.'">Read more</a> </div>
                <div class="cl">&nbsp;</div>
                ';
                if(++$i==4) break;
                }
            ?>
        </div>
        <div id="news">
            <div class="head">
                <h3>POPULAR TV SHOWS</h3>
                <p class="text-right">&nbsp;</p>
            </div>
            <?php
            include_once "api/tvPopular.php";
            $i=0;
            foreach($tvPopular->results as $p){
                echo' 
                <div class="content">
                    <h4>'.$p->original_name.' </h4>
                    <a href="tv.php?id='.$p->id.'"><img src="https://image.tmdb.org/t/p/w500'.$p->poster_path.'" alt="" /></a>
                    <p>'.$p->overview.'</p>
                    <a href="tv.php?id='.$p->id.'">Read more</a> </div>
                <div class="cl">&nbsp;</div>
                ';
                if(++$i==4) break;
            }
            ?>
        </div>
        <div class="cl">&nbsp;</div>
    </div>

</div>
<!-- END PAGE SOURCE -->
</body>
</html>
