<?php
$id_movie = $_GET['id'];
include_once "api/movie_id.php";
include_once "api/movie_video_id.php";

?>
<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Moviewer</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-func.js"></script>
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
    <div class="main">
        <?php
        include_once "api/movie_id.php";
        include_once "api/movie_video_id.php";
        if(isset($_GET['id'])){
            $id_movie=$_GET['id'];
        }
        ini_set("precision", 3);
        ?>

        <div class="movie">
            <div class="upside">
                <div class="header">
                    <h1><?php echo $movie_id->original_title?></h1>
                </div>
                <div class="image">
                    <a><img src="https://image.tmdb.org/t/p/w500<?php echo $movie_id->poster_path?>" alt="" /></a>
                </div>
                <div class="video">
                    <?php
                    $i = 0;
                        foreach ($movie_video_id->results as $video){
                            echo '<iframe width="560" height="315" src="'."https://www.youtube.com/embed/".$video->key.'"frameboard="0" allowfullscreen></iframe>
                            ';
                            if(++$i==2) break;
                        }

                    ?>
                </div>
            </div>
            <div class="overview">
                <p>Overview</p>
                <p>&nbsp;</p>
                <p><?php echo $movie_id->overview?></p>
            </div>
            <div class="budget"><p>Budget:&nbsp<?php echo $movie_id->budget/1000000?>M $ </p></div>
            <div class="original-language"><p>Original language:&nbsp<?php echo $movie_id->original_language?></p></div>
            <div class="release-date"><p>Release date:&nbsp<?php echo $movie_id->release_date?></p></div>
            <div class="rating"><p>Rating:&nbsp <?php echo $movie_id->vote_average?></p>
                <div class="stars" >
                    <div class="stars-in" style="width:<?php echo $movie_id->vote_average * 6 ?>px "> </div >
                </div >
            </div>
            <div class="comments"></div>
        </div>
    </div>

</div>
<!-- END PAGE SOURCE -->
</body>
</html>


