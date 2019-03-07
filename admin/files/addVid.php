<?php
    require ("../../inc/functions.php");

    $title=$_POST['title'];
    $show=$_POST['show'];

    $uploadfile = $_FILES["uploadvideo"]["tmp_name"];
    $folderPath = "../../assets/video/";
    
    if (! is_writable($folderPath) || ! is_dir($folderPath)) {
        echo "error";
        exit();
    }
    $path2="../assets/video/";
    $path3="../assets/video/snapshots/";
    $temp = explode(".", $_FILES["uploadvideo"]["name"]);
    function getRand($len) {
        $characters = "45!2*&#(+678a9efghi!2*&#(+ijklm5-678o0123!#*&#))(+456789/pqrstUVwxyzabcD01JKL/";
        $string = "";
        for ($i = 0; $i < $len; $i++) 
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        return $string;
    }
    $random = getRand(5);
    $nwname=$random.'zonse.'.end($temp);
    if (move_uploaded_file($_FILES["uploadvideo"]["tmp_name"], $folderPath . $nwname)) {


        class PHPffmpegDemo
            {
                
                public function __construct()
                {
                     exec("ffmpeg.exe"); // load ffmpeg.exe
                }
                public function convertIt($file)
                {
                    
                    exec("ffmpeg -ss 00:00:02 -i ../../assets/video/".$file." -vf scale=800:-1 -vframes 1 ../../assets/video/snapshots/".$file.".jpg");  
                }
            }

            $obj = new PHPffmpegDemo();
            $obj->convertIt($nwname);
            $pic=$nwname.".jpg";

        $name = $_FILES["uploadvideo"]["name"];
        $q=mysqli_query($mysqli,"INSERT INTO videos(s_id,v_file,v_title,snapshot) VALUES('$show', '$nwname', '$title','$pic')");
        echo '<video controls preload="none" playsinline uk-video="autoplay: false" width="800px" height="400px">
                  <source src="' . $path2 . "" . $nwname . '" type="video/mp4">
                </video> <br/>
                <img src="' . $path3 . "" . $nwname . '" style="border-radius:100%; width:25%"> <br/> 

                ';
        
        exit();
    }




?>