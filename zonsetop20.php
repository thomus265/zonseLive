<?php require("inc/header.php");
  
  //update top 20 List
  $trunc = mysqli_query($mysqli,"TRUNCATE `top20`");
  $insert = mysqli_query($mysqli,"INSERT INTO `top20` (`tid`, `music_id`, `position`, `updated`) VALUES (NULL, NULL, '1', CURRENT_TIMESTAMP), (NULL, NULL, '2', CURRENT_TIMESTAMP), (NULL, NULL, '3', CURRENT_TIMESTAMP), (NULL, NULL, '4', CURRENT_TIMESTAMP), (NULL, NULL, '5', CURRENT_TIMESTAMP), (NULL, NULL, '6', CURRENT_TIMESTAMP), (NULL, NULL, '7', CURRENT_TIMESTAMP), (NULL, NULL, '8', CURRENT_TIMESTAMP), (NULL, NULL, '9', CURRENT_TIMESTAMP), (NULL, NULL, '10', CURRENT_TIMESTAMP), (NULL, NULL, '11', CURRENT_TIMESTAMP), (NULL, NULL, '12', CURRENT_TIMESTAMP), (NULL, NULL, '13', CURRENT_TIMESTAMP), (NULL, NULL, '14', CURRENT_TIMESTAMP), (NULL, NULL, '15', CURRENT_TIMESTAMP), (NULL, NULL, '16', CURRENT_TIMESTAMP), (NULL, NULL, '17', CURRENT_TIMESTAMP), (NULL, NULL, '18', CURRENT_TIMESTAMP), (NULL, NULL, '19', CURRENT_TIMESTAMP), (NULL, NULL, '20', CURRENT_TIMESTAMP)");

  $q = mysqli_query($mysqli,"SELECT * FROM music ORDER BY count DESC LIMIT 20");
  $position = 0;
  while ($r=mysqli_fetch_array($q)) {
    $position ++;
    $music_id=$r['music_id'];
    $query = mysqli_query($mysqli,"UPDATE top20 SET music_id='$music_id' WHERE position='$position'");
  }

  $query = mysqli_query($mysqli,"SELECT * FROM music m INNER JOIN top20 t WHERE m.music_id = t.music_id AND position=1");
  while($res=mysqli_fetch_array($query)){
    $artist=$res['artist'];
    $art=$res['art'];
    $title=$res['title'];
    $song=$res['song'];
    $fid = $res['music_id'];
  }

 ?>
  <script type="text/javascript">
  $(".top20").addClass("active");
  $(".news").removeClass("active");
  $(".home").removeClass("active");
  $(".ztv").removeClass("active");
  $(".music").removeClass("active");
  $(".artist").removeClass("active");
  $(".about").removeClass("active");
</script>
<section  id="top20Lst">
  <div>
    <section class="opening top20-1" style="height: 40vh; background: url('assets/img/covers/<?php echo $art ?>'); background-size: cover; margin-top: -30px !important">
      <div style="background:rgba(73,184,234,0.8); height: 40vh" class="top20-1">
        <div class="container-fluid">
          <div class="r" >
            <div class="uk-grid-small" uk-grid style="margin-left: 0px;">
              <div class="uk-width-1-4@m  ">    
               </div>
              <div  class="uk-width-1-2@m">
                <div uk-grid style="margin-top: 5%" class="num1">
                  <div class="uk-width-auto ">
                    <img src="assets/img/covers/<?php echo $art ?>" width="200px" class="num1-img">
                  </div>
                  <div class="uk-width-auto" style="padding-left: 10px">
                    <h1 style="font-size: 10em ; font-weight: bold" class="white-text num1-num">1</h1>
                  </div>
                  <div class="uk-width-expand num-1-detail" style="padding-left: 0; padding-top: 7% !important">
                    <h4 class="uk-margin-remove-bottom white-text num-1-title truncate" style="font-size: 2em;"><?php echo $title ?></h4>
                    <p class="uk-text-meta uk-margin-remove-top white-text num1-artist uk-margin-remove-bottom truncate" style="font-size: 1.5em "><?php echo $artist ?> </p>

                    <p class="uk-margin-remove-top"><div class="mediPlayer" style="float: left">
                      <audio oncanplay="javascript: updStream(<?php echo $fid ?>)" class="listen" preload="none" data-size="250" src="assets/music/<?php echo $song ?>"></audio>
                    </div>  <a onclick="javascript: updStream(<?php echo $fid ?>)" style="padding-left: 10px" href="assets/music/<?php echo $song ?>" class="white-text" uk-icon="icon: download; ratio:1.5"></a></p>
                  </div>
                </div>
              </div>
              <div class="uk-width-1-4@m ">
                  
              </div>
          </div>
          </div>
        </div>
      </div>
    </section>
      
      <div class="top-20 container-fluid" style="margin-top: 1%">
        <div class="row">
          <div class="col-sm-2">
            
          </div>
          <div class="col-sm-7" >
            <center>
              <div id="bannerAd" style="margin-bottom: 3%; ">
                <img src="assets/img/ads/crystal.jpg" width="100%" height="30px">
              </div>
            </center>
            <div class="container heading">
              <center><h2 class="blue-text uk-margin-remove-bottom">Zonse Top 20</h2> <p class="uk-text-meta uk-margin-remove-top blue-text">(Fan Pick)</p></center>
            </div>
            <ul id="playlist">



        <?php 
        $query = mysqli_query($mysqli,"SELECT * FROM music m INNER JOIN top20 t WHERE m.music_id = t.music_id AND position!=1 ORDER BY position ASC");
          while($res=mysqli_fetch_array($query)){
          ?>

            <li class="">
              
            <div class="row chart-item">
              <div class="num-cont z-width-auto" style="width: 45px;"><h3><?php echo $res['position'] ?></h3></div>
              <div class="img-cont">

                <div class="uk-inline uk-dark">
                  <img src="assets/img/covers/<?php echo $res['art'] ?>">
                  <div class="uk-overlay-primary uk-position-cover" style="background: rgba(0,0,0,0.5) !important; margin-right: 20%">
                      <div class="uk-position-center">
                        <div class="mediPlayer" style=" margin-right: -22%">
                            <audio oncanplay="javascript: updStream(<?php echo $res['music_id'] ?>)" class="listen" preload="none" data-size="250" src="assets/music/<?php echo $res['song'] ?>"></audio>
                        </div>
                      </div>
                  </div>

              </div>

              </div>
              <div class="info-cont z-width-expand">
                <h4 class="uk-margin-remove-bottom t20title truncate"><?php echo $res['title'] ?></h4>
                <p class="uk-text-meta uk-margin-remove-top uk-margin-remove-bottom t20artist truncate"> <?php echo $res['artist'] ?> <span style="margin-left: 2em" >  </span></p>
                <p class="uk-margin-remove-top"><a  href="assets/music/<?php echo $res['song'] ?>" onclick="javascript: updDownload(<?php echo $res['music_id'] ?>)" uk-icon="icon: download"></a></p>
              </div>
            </div>
          </li>

        
        <?php
      }
      ?>
      </ul>
      <center>
              <div id="bannerAd" style="margin-bottom: 5%; ">
                <img src="assets/img/ads/pink.jpg" width="100%" height="30px">
              </div>
            </center>


          </div>
          <div class="col-sm-3">
            <?php require("inc/side.php"); ?>
          </div>
        </div>


        

      </div>
  </div>
</section>
<?php require("inc/footer.php") ?>

<script>
    $(document).ready(function () {
        $('.mediPlayer').mediaPlayer();     
    });
    function updStream(id){
      $.ajax({
              url: "files/addStream.php",
          type: "POST",
          data:  {id:id,},
          success: function(data)
            {
              
          },
            error: function() 
            {
              alert("data");
            }           
         });
    }
    function updDownload(id){
      $.ajax({
          url: "files/addDownload.php",
          type: "POST",
          data:  {id:id,},
          success: function(data)
            {
              alert(data);
          },
            error: function() 
            {
              alert("data");
            }           
         });
    }
</script>
