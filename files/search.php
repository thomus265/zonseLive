<?php
require('../inc/functions.php');

$actionName = $_POST["action"];
if($actionName == "showPost"){

	$resultData = [];
	$search_key = $_POST["search_key"];
	$search_type = $_POST["search_type"];

	$searchKey = '';
	if(!empty($search_key)){
		if($search_type == 'single'){
			$searchKey .= " where title like '%".$search_key."%' ";
			$searchKey .= " or artist like '%".$search_key."%' ";
		}else if($search_type == 'many'){
			$searchKey .= " where title REGEXP '". str_replace(" ", "|", $search_key) ."' ";
			$searchKey .= " or artist REGEXP '". str_replace(" ", "|", $search_key) ."' ";
		}
	}

	//get rows query
	$query = "SELECT * FROM music ".$searchKey." ORDER BY music_id DESC ";
	$result = mysqli_query($mysqli, $query);

	//number of rows
	$rowCount = mysqli_num_rows($result);

	if($rowCount > 0){
	    while($row = mysqli_fetch_assoc($result)){
	    	$resultData[] = $row;
	    }
	}

	echo json_encode($resultData);
}
?>