
<?php
    $strTimeAgo = ""; 
    if(!empty($_POST["date-field"])) {
        $strTimeAgo = timeago($_POST["date-field"]);
    }

    function timeago($date) {
       $timestamp = strtotime($date);   
       
       $strTime = array("second", "minute", "hour", "day", "month", "year");
       $length = array("60","60","24","30","12","10");

       $currentTime = time();
       if($currentTime >= $timestamp) {
            $diff     = time()- $timestamp;
            for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
            }

            $diff = round($diff);
            return $diff . " " . $strTime[$i] . "(s) ago ";
       }
    }

    
?>

<?php 
  function conv($date){
    $convert = date('j M, Y \a\t g:i a', strtotime($date));
    echo $convert;
    } 
    function timeconv($date){
    $convert = date('g:i a', strtotime($date));
    echo $convert;
    } 

function dateString($date){
    $convert = date('j M, Y ', strtotime($date));
    echo $convert;
    } 


  function dateS($date){
    $convert = date("jS F Y", strtotime($date));
    echo $convert;
  }
    
      function dateStr($date){
    $convert = date("jS F Y, h:i:a", strtotime($date));
    return $convert;
    } 


    ?>