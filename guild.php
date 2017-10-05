<?php include "header.php"; ?>
		<div id="right">
			<div id="middle"></div>
			<div id="middle1">
				<h2><?php echo "$NS"; ?> - Ranking gildii</h2>
<table border="0" align="center">
	<tr>
		<th width="0">#</th>
		<th width="150">Gildia</th>
		<th width="100">Exp</th>
		<th width="40">Lvl</th>
		<th width="60">Win</th>
		<th width="60">Loss</th>
		<th width="60">Yang</th>
	</tr>
</table>
<?php
include ('config.php');
mysql_select_db("player");
$sql = mysql_query("SELECT * FROM guild ORDER BY level desc, exp desc limit 10000");
$numrows = mysql_num_rows($sql);
for($x=1; $x<$numrows+1; $x++){
$resrow = mysql_fetch_row($sql);
	$id = $resrow[0];
	$name = $resrow[1];
	$exp = $resrow[5];
	$level = $resrow[4];
	$win = $resrow[8];
	$loss = $resrow[10];
	$gold = $resrow[12];
$sql2 = mysql_query("SELECT empire FROM player_index where id='$id'");
{$resrow1 = mysql_fetch_row($sql2);
	$empire = $resrow1[0];
	

?><table border="0" align="center">
	<tr>
		<th width="0"><p id="p"> <?php echo "$x"; ?> </th>
		<th width="150"><p id="p"> <?php echo "$name"; ?> </p></th>
		<th width="100"><p id="p"> <?php echo "$exp"; ?> </th>
		<th width="30"><p id="p"> <?php echo "$level"; ?> </p></th>
		<th width="60"><p id="p"> <?php echo "$win"; ?> </th>
		<th width="60"><p id="p"> <?php echo "$loss"; ?> </p></th>
		<th width="60"><p id="p"> <?php echo "$gold"; ?> </p></th>
	</tr>
</table>
<?php
}
}
?>
			</div>
			<div id="middle2"></div>
		</div>
<?php include "footer.php"; ?>