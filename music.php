<?php require("inc/header.php");

  //update top 20 List
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


 ?>

 <?php
                $sql = "SELECT COUNT(music_id) FROM music";
                $query = mysqli_query($mysqli, $sql);
                $row = mysqli_fetch_row($query);
                // Here we have the total row count
                $rows = $row[0];
                // This is the number of results we want displayed per page
                $page_rows = 10;
                // This tells us the page number of our last page
                $last = ceil($rows/$page_rows);
                // This makes sure $last cannot be less than 1
                if($last < 1){
                  $last = 1;
                }
                // Establish the $pagenum variable
                $pagenum = 1;
                // Get pagenum from URL vars if it is present, else it is = 1
                if(isset($_GET['pn'])){
                  $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
                }
                // This makes sure the page number isn't below 1, or more than our $last page
                if ($pagenum < 1) { 
                    $pagenum = 1; 
                } else if ($pagenum > $last) { 
                    $pagenum = $last; 
                }
                // This sets the range of rows to query for the chosen $pagenum
                $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
                // This is your query again, it is for grabbing just one page worth of rows by applying $limit
                $sql = "SELECT * FROM music ORDER BY music_id DESC $limit";
                $query = mysqli_query($mysqli, $sql);
                // This shows the user what page they are on, and the total number of pages
                $textline1 = " (<b>$rows</b>)";
                $textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
                // Establish the $paginationCtrls variable
                $paginationCtrls = '';
                // If there is more than 1 page worth of results
                if($last != 1){
                  /* First we check if we are on page one. If we are then we don't need a link to 
                     the previous page or the first page so we do nothing. If we aren't then we
                     generate links to the first page, and to the previous page. */
                  if ($pagenum > 1) {
                        $previous = $pagenum - 1;
                    $paginationCtrls .= '<a class="btn btn-primary" href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
                    // Render clickable number links that should appear on the left of the target page number
                    for($i = $pagenum-4; $i < $pagenum; $i++){
                      if($i > 0){
                            $paginationCtrls .= '<a class="btn btn-primary linked" href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
                      }
                      }
                    }
                  // Render the target page number, but without it being a link
                  $paginationCtrls .= ''.$pagenum.' &nbsp; ';
                  // Render clickable number links that should appear on the right of the target page number
                  for($i = $pagenum+1; $i <= $last; $i++){
                    $paginationCtrls .= '<a class="btn btn-primary linked"  href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
                    if($i >= $pagenum+4){
                      break;
                    }
                  }
                  // This does the same as above, only checking if we are on the last page, and then generating the "Next"
                    if ($pagenum != $last) {
                        $next = $pagenum + 1;
                        $paginationCtrls .= ' &nbsp; &nbsp; <a class="btn btn-primary" href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
                    }
                }
                $list = '';
                while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                  $id = $row["music_id"];
                  $artist = $row["artist"];
                  $title = $row["title"];
                  $song = $row['song'];
                  $art = $row['art'];
                  $datemade = $row["uploaded"];
                  $datemade = strftime("%b %d, %Y", strtotime($datemade));
                  $list .= '<li class="">
                              
                            <div class="row chart-item">
                              <div class="img-cont">
                               
                                <div class="uk-inline uk-dark">
                                  <img src="assets/img/covers/'.$art.'">
                                  <div class="uk-overlay-primary uk-position-cover" style="background: rgba(0,0,0,0.5) !important; margin-right: 20%">
                                      <div class="uk-position-center">
                                        <div class="mediPlayer" style=" margin-right: -22%">
                                            <audio oncanplay="javascript: updStream('.$id.')" class="listen" preload="none" data-size="250" src="assets/music/'.$song.'"></audio>
                                        </div>
                                      </div>
                                  </div>

                              </div>
                            
                              </div>
                              <div class="info-cont z-width-expand">
                                <h4 class="uk-margin-remove-bottom t20title">'.$title.'</h4>
                                <p class="uk-text-meta uk-margin-remove-top uk-margin-remove-bottom t20artist truncate"> '.$artist.'<span style="margin-left: 2em" > </span></p>
                                <p class="uk-margin-remove-top"><a  href="assets/music/'.$song.'" onclick="javascript: updDownload('.$id.')" uk-icon="icon: download"></a></p>
                              </div>
                            </div>
                          </li>';
                }
                // Close your database connection
                mysqli_close($mysqli);
                ?>

<script type="text/javascript">
  $(".music").addClass("active");
  $(".top20").removeClass("active");
  $(".ztv").removeClass("active");
  $(".home").removeClass("active");
  $(".artist").removeClass("active");
  $(".about").removeClass("active");
</script>
<section  id="top20Lst">
  <div>
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
              <center>
                <h2 class="blue-text uk-margin-remove-bottom">Zonse Music <?php echo $textline1; ?></h2>
                
              </center>
            </div>
            <ul id="playlist">
              <?php echo $list; ?>
            </ul>
            <div id="pagination_controls" style="margin-bottom: 2%">
              <center><p><?php echo $textline2; ?></p> <?php echo $paginationCtrls; ?></center>
            </div>
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






<style type="text/css">

div#pagination_controls{font-size:21px;}
div#pagination_controls > a{ color:#06F; background: #444; border-radius: 100% }
div#pagination_controls > a:visited{ color:#06F; }
.btn{
  color: #fff !important;
}

</style>


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
