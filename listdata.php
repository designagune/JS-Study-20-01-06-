<?php
		$db = new mysqli(
			"localhost",
			"set555",
			"ehdrjs293!",
			"set555"
		);
		$sql = "SELECT *,date(`datetime`) as `dt` FROM `board2019` ORDER BY `board` DESC";
		$result = $db -> query($sql);
?>
{
	"list" : [
	<?php
	//echo "qqwer".$result->num_rows;
	$rownumber = 0;
	while($row=$result->fetch_object()):
	?>
	{
		"board" : "<?php echo $row->board; ?>",
		"title" : "<?php echo $row->title; ?>",
		"dt" : "<?php echo $row->dt; ?>",
		"writer" : "<?php echo $row->writer; ?>",
		"hit" : "<?php echo $row->hit; ?>"
	}
	<?php
	if(++$rownumber != $result->num_rows){
		echo ",";
	}
	endwhile;
	?>
	]
}