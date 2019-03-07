
<?php 
  session_start();
  if(!$_SESSION['id']){
    header('location: login.php');
  }
  else{
    $session_id=$_SESSION['id'];
    $q=mysqli_query($mysqli,"SELECT * FROM users WHERE user_id='$session_id'");
    while($res=mysqli_fetch_array($q)){
      $username = $res['userName'];
      $email = $res['email'];
      $img = $res['img'];
    }
  }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ZonseLIve |Admin</title>
  <meta name="description" content="A free and modern UI toolkit for web makers based on the popular Bootstrap 4 framework.">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css"">
  <link rel="stylesheet" href="../assets/css/shards.min.css?v=2.1.0">
  <link rel="stylesheet" href="../assets/css/shards-dashboards.1.1.0.min.css">
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/IuiaDsNc.woff2">
  <link rel="stylesheet" type="text/css" href="../assets/css/Material+Icons.css">
  <link rel="stylesheet" href="../assets/css/uikit.css">

  <script src="../assets/js/jquery-2.2.3.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/shards.js"></script>
  <script src="../assets/js/jqueryForm.js"></script>
  <script src="../assets/js/audioPlayer.js"></script>
  <script src="../assets/js/uikit.js"></script>
  <script src="../assets/js/uikit-icons.js"></script>

  

  
</head>
<body style="min-height: 100vh">
  <style type="text/css">

.progress {
    display: none;
    position: relative;
    margin-top: 20px;
    width: 100%;
    background-color: #ddd;
    border: 1px solid #999;
    padding: 1px;
    left: 0px;
    border-radius: 3px;
}

.progress-bar {
  
    width: 0%;
    height: 10px;
    border-radius: 50px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
}

.percent {
    position: absolute;
    display: inline-block;
    color: #fff;
    font-size: 8px;
    font-weight: lighter;
    top: 50%;
    left: 50%;
    margin-top: -4px;
    margin-left: -20px;
    -webkit-border-radius: 4px;
}
.cont{
  margin-top: -2%;
}
.sidebar{
  height: 500vh !important;
  position: fixed;
  margin-top: -2%;
  width: 500px;
  
}

</style>


<div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4" style="margin-bottom: none !important">

    <a class="navbar-brand" href="javascript: home()"> <img src="../assets/img/logo.png" width="50px"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-5" aria-controls="navbarNavDropdown-5"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mr-auto" id="navbarNavDropdown-5">
      <ul class="navbar-nav ml-auto right">
        <li class="nav-item active nav1">
          <a class="nav-link" href="index.php" id="index" >Dashboard
          </a>
        </li>
        <li class="nav-item nav2">
          <a class="nav-link" href="blog.php">News</a>
        </li>
        <li class="nav-item nav4">
          <a class="nav-link" href="ztv.php">Zonse TV</a>
        </li>
        <li class="nav-item nav4">
          <a class="nav-link" href="#">Music</a>
          <div uk-dropdown="mode:click">
            <ul class="uk-nav uk-dropdown-nav">
              <li><a href="top20.php">Top 20 List</a></li>
              <li><a href="allmusic.php">All Music</a></li>
              <li><a href="submissions.php">Music Submissions</a></li>
              <li><a href="music.php">Add Song</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item nav4">
          <a class="nav-link" href="users.php">users</a>
        </li> 
        <li class="nav-item nav4">
          <a class="nav-link" href="#"> <img src="../assets/img/user/<?php echo $img ?>" style="border-radius: 100%" width="40px"> </a>
          <div uk-dropdown="mode:click">
            <ul class="uk-nav uk-dropdown-nav">
              <li><a href="profile.php">Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </li>        
      </ul>
    </div>
  </nav>
