<?php
$input=$_GET['search'];
$channel=$_GET['channel'];
$search=$input;
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
        <h1 id="logo"><a href="/index.php">Moviewer</a></h1>
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
                <li><a class="active" href="/index.php">HOME</a></li>
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
                    <?php
                    include_once "api/searchMovie.php";
                    ?>
                    <h2>SEARCH RESULTS FOR "<?php echo $input?>"</h2>
                    <p class="text-right">&nbsp;</p>
                </div>
                <div class="container">
                    <?php
                    include_once "api/searchMovie.php";
                    if($channel=="movie")
                        foreach ($search->results as $p) {
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
                        }
                    elseif ($channel=="tv"){
                        foreach ($search->results as $p) {
                            echo'
                            <div class="movie" >
                                <div class="movie-image" > <span class="play" ><span class="name" >'. $p->original_name.'</span ></span > <a href ="tv.php?id='.$p->id.'" ><img src = "https://image.tmdb.org/t/p/w500'.$p->poster_path.'" alt = "" /></a > </div >
                                <div class="rating" >
                                    <p > RATING</p>                                
                                    <div class="stars" >
                                        <div class="stars-in" style="width:'. $p->vote_average * 6 .'px "> </div >
                                    </div >
                                    <span class="comments" > '.$p->vote_count.'</span > </div >
                            </div >
                            ';
                        }
                    }
                    elseif ($channel=="multi"){
                            foreach ($search->results as $p) {
                                if($p->media_type=="tv") {
                                    echo '
                                <div class="movie" >
                                    <div class="movie-image" > <span class="play" ><span class="name" >' . $p->original_name . '</span ></span > <a href ="tv.php?id=' . $p->id . '" ><img src = "https://image.tmdb.org/t/p/w500' . $p->poster_path . '" alt = "" /></a > </div >
                                    <div class="rating" >
                                        <p > RATING</p>                                
                                        <div class="stars" >
                                            <div class="stars-in" style="width:' . $p->vote_average * 6 . 'px "> </div >
                                        </div >
                                        <span class="comments" > ' . $p->vote_count . '</span > </div >
                                </div >
                                ';
                                }
                                else if($p->media_type=="movie"){
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
                                }
                            }



                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="cl">&nbsp;</div>
    </div>

</div>
<!-- END PAGE SOURCE -->
</body>
</html>
