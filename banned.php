<?php include "header.php"; ?>
		<div id="right">
			<div id="middle"></div>
			<div id="middle1">
				<h2><?php echo "$NS"; ?> - Zbanowani</h2>
<table border="0" align="center">
	<tr>
		<th width="0"> # </th>
		<th width="150"> Player </th>
		<th width="50"> Lvl. </th>
		<th width="50"> Kraj </th>
	</tr>
</table>
<?php
include ('config.php');
mysql_select_db("account");
$sql = mysql_query("SELECT id,login,status FROM account where status='BAN'");
$numrows = mysql_num_rows($sql);
for($x=1; $x<$numrows+1; $x++){
$resrow = mysql_fetch_row($sql);
	$id = $resrow[0];
	$login = $resrow[1];
	$status = $resrow[2];
	$ban = $resrow[3];
	$databan = $resrow[4];
	
mysql_select_db("player");
$sql1 = mysql_query("SELECT empire FROM player_index where id='$id'");
{$resrow1 = mysql_fetch_row($sql1);
	$empire = $resrow1[0];
	
if($empire == '1') { $empire = "<img src='images/1.jpg' width='30' title='Imperium Shinsoo' />'";}
if($empire == '2') { $empire = "<img src='images/2.jpg' width='30' title='Imperium Chunjo' />"; }
if($empire == '3') { $empire = "<img src='images/3.jpg' width='30' title='Imperium Jinno' />"; }

$sql2= mysql_query("SELECT * FROM player where account_id='$id' ORDER BY name DESC");
while($oggetto = mysql_fetch_object($sql2))

echo "
<table border=\"0\" align=\"center\">
	<tr>
		<th width=\"0\"> $x </th>
		<th width=\"150\"><p id='p'> $oggetto->name </p></th>
		<th width=\"50\"><p id='p'> $oggetto->level </p></th>
		<th width=\"50\"> $empire </th>
	</tr>
</table>
";
}
}
?>
<br><br><br>
Znalaz³eœ hackera?<br>
Powiadom nas o tym jak najszybciej!!!				
			</div>
			<div id="middle2"></div>
		</div>
<?php include "footer.php"; ?>