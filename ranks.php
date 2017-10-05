<?php include "header.php"; ?>
		<div id="right">
			<div id="middle"></div>
			<div id="middle1">
				<h2><?php echo "$NS"; ?> - Ranking graczy - Top 100</h2>
<table border="0" align="center">
	<tr>
		<th width="0"> # </th>
		<th width="150"> Player </th>
		<th width="100"> Klasa </th>
		<th width="30"> Lvl. </th>
		<th width="60"> Kraj </th>
		<th width="150"> EXP </th>
	</tr>
</table>
<?php
include ('config.php');
mysql_select_db("player");
$sql = mysql_query("SELECT name,exp,level,gold,job,account_id FROM player where name NOT LIKE '[GM]%' AND name NOT LIKE '[GA]%'  AND name NOT LIKE '[HA]%' AND name NOT LIKE '[SGM]%' ORDER BY level DESC limit 10000");
$numrows = mysql_num_rows($sql);
for($x=1; $x<$numrows+1; $x++){
$resrow = mysql_fetch_row($sql);
	$name = $resrow[0];
	$exp = $resrow[1];
	$liv = $resrow[2];
	$gold = $resrow[3];
	$class = $resrow[4];
	$id = $resrow[5];
	
if($class == '0') { $class = "Wojownik";}
if($class == '1') { $class = "Ninja"; }
if($class == '2') { $class = "Sura"; }
if($class == '3') { $class = "Szaman"; }
if($class == '4') { $class = "Wojownik"; }
if($class == '5') { $class = "Ninja"; }
if($class == '6') { $class = "Sura"; }
if($class == '7') { $class = "Szaman"; }

$sql2 = mysql_query("SELECT empire FROM player_index where id='$id'");
{$resrow1 = mysql_fetch_row($sql2);
	$empire = $resrow1[0];
	
if($empire == '1') { $empire = "<img src='images/1.jpg' width='30' title='Imperium Shinsoo' />";}
if($empire == '2') { $empire = "<img src='images/2.jpg' width='30' title='Imperium Chunjo' />"; }
if($empire == '3') { $empire = "<img src='images/3.jpg' width='30' title='Imperium Jinno' />"; }
?>
<table border="0" align="center">
	<tr>
		<th width="0"><p id="p"> <?php echo "$x"; ?> </th>
		<th width="150"><p id="p"> <?php echo "$name"; ?> </p></th>
		<th width="100"> <p id="p"><?php echo "$class"; ?> </th>
		<th width="30"><p id="p"> <?php echo "$liv"; ?> </p></th>
		<th width="60"> <?php echo "$empire"; ?> </th>
		<th width="150"><p id="p"> <?php echo "$exp"; ?> </p></th>
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