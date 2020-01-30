<?php
// $val = <<<json
// {
// 	"b2" : "100",
// 	"C2" : ["200","201","202",{"value":"203","name":"mememe"}]
// }
// json;
// echo $val;
$db = new mysqli(
			"localhost",
			"set555",
			"ehdrjs293!",
			"set555"
		);

		echo $db->stat();

		$sql = "select * from 'board2019' ";
		$result = $db -> query($sql);

		$i = 0;
		while($row=$result->fetch_object()){
			$i++;
			echo $i;
		}
?>