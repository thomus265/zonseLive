<?php 
  require ("../../inc/functions.php");

  $id = $_POST['id'];

  $query = mysqli_query($mysqli,"SELECT * FROM music WHERE music_id=$id");
  while($res = mysqli_fetch_array($query)){
    $cover = $res['art'];
    $song = $res['song'];
  }
    unlink("../../assets/img/covers/".$cover);
    unlink("../../assets/music/".$song);

$deleteMusic = mysqli_query($mysqli,"DELETE FROM top20 WHERE music_id=$id");
  $deleteMusic = mysqli_query($mysqli,"DELETE FROM music WHERE music_id=$id");
  if(!$deleteMusic){
    echo "Error Encountered".$id;
  }
  else{
    echo "Deleted Successfuly";
  }
    



?>