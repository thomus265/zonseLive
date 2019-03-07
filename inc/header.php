<?php require('inc/functions.php');  require('inc/timeago.php'); 

function readMore($content, $limit) {
  $content = substr($content,0,$limit);
  $content = substr($content,0,strrpos($content,' '));
  return $content."...";
}

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="google-site-verification" content="RSoPmCqrauBfNzcofPpXyo09yvTZ1ulQZTAJXlOIhQI" />
  <title>ZonseLIve</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"">
  <link rel="stylesheet" href="assets/css/shards.min.css?v=2.1.0">
  <link rel="stylesheet" type="text/css" href="assets/css/IuiaDsNc.woff2">
  <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css">
  <link rel="stylesheet" href="assets/css/uikit.css">
  <script src="assets/js/jquery-2.2.3.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/shards.js"></script>
   <script src="assets/js/player.js"></script>
  <script src="assets/js/uikit.js"></script>
  <script src="assets/js/uikit-icons.js"></script>
  
    <link rel="stylesheet" href="assets/css/custom.css">
  <style>
        #playlist{
            list-style: none;
        }
        #playlist li .row .img-cont a{
            color:white;
            text-decoration: none;
        }
        #playlist .current-song .row{
          box-shadow: 2px 2px 5px 0px #adadad;
        }
        .hide{
          display: none
        }
    </style>
</head>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4" style="margin-bottom: none !important">
  <img src=""  class="mr-2" height="30">
  <a class="navbar-brand" href="javascript: home()"> <img src="assets/img/logo.png" width="80px"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-5" aria-controls="navbarNavDropdown-5"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse mr-auto" id="navbarNavDropdown-5">
    <ul class="navbar-nav ml-auto right">
      <li class="nav-item  home">
        <a class="nav-link" href="index.php" id="index" >Home
        </a>
      </li>
      <li class="nav-item news">
        <a class="nav-link" href="news.php">News</a>
      </li>
      <li class="nav-item top20">
        <a class="nav-link" href="zonsetop20.php">Zonse top 20</a>
      </li>
      <li class="nav-item ztv">
        <a class="nav-link" href="zonsetv.php">Zonse TV</a>
      </li>
      <li class="nav-item music">
        <a class="nav-link" href="music.php">Music</a>
      </li>
      <li class="nav-item artist">
        <a class="nav-link" href="artist.php">Artist</a>
      </li>
      <li class="nav-item about">
        <a class="nav-link" href="about.php" > About</a>
      </li>
    </ul>
  </div>
</nav>

