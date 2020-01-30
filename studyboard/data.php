<?php
    header('Content-Type: application/json');
    $db = new mysqli
    (
        "localhost",
        "flexcode",
        "flex200106!",
        "flexcode"
    );

    $sql = "SELECT *,date(`datetime`) as `dt` FROM `board` ORDER BY `num` DESC";
    $result = $db -> query($sql);

    $board = array();
	$i = 0;
	// $page = $_GET['page'] * 10;
	// echo $page;
	while( $row = $result -> fetch_object() ){	 	
	 	${"row".$i} = array(
	 		"board" => $row->num,
			"title" => $row->title,
			"date"  => $row->dt,
			"hit"   => $row->hit,
			"writer"=> $row->id
	 	);
	 	array_push($board,${"row".$i});
	 	++$i;
	}

	$output = json_encode($board);

	echo urldecode($output);
?>
