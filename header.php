<html>
	<head>
		<link href="style.css" type="text/css" rel="stylesheet" />
		<title> <?php include('nazwa.txt'); ?></title>

	</head>
	<body>

		<div id="menu"><br>
			<a href="index.php">Home</a>
			<a href="register.php">Rejestracja</a>
			<a href="ranks.php">Ranking graczy</a>
			<a href="banned.php">Zbanowani</a>
			<a href="itemshop/">Item Shop</a>
			<a href="linkdoforum" target="_black">Forum</a>
			<a href="download.php">Download</a>			
		</div>
		<div id="header"></div>	

		<div id="title"> <?php echo "$NS"; ?> </div>

		<div id="menu1"><br>
			<a href="guild.php">Ranking gildii</a>
			<a href="regulamin.php">Regulamin</a>
			<a href="support.php">Kontakt</a>
			<a href="events.php">Eventy</a>	
			<a href="zmiana.php">Zmiana has³a</a>
		</div>
		<div id="left">
			<div id="left_1"></div>
			<div id="left_2">
				<h1>Panel gracza</h1>
<li><?php include('log.php'); ?></li></div>
			<div id="left_2"></div>
			<div id="left_3">	
		</div>
			<div id="left_1"></div>
			<div id="left_2">
				<h1>Status</h1>
					<li><?php
function check_port($port) {
    $conn = @fsockopen("TWOJE IP", $port, $errno, $errstr, 0.2);
    if ($conn) {
        fclose($conn);
        return true;
    }
}

function server_report() {
    $report = array();
    $svcs = array(
	'11002'=>'LOGOWANIE',
    '13000'=>'CH1',
	'16000'=>'CH2',
	'80000'=>'CH3',
    '280002'=>'CH4');
    foreach ($svcs as $port=>$service) {
        $report[$service] = check_port($port);
    }
    return $report;
}

$report = server_report();
?>
<div style="text-align: center; margin-left: 10px;" class="srvstatus">

<a style="color: rgb(102, 102, 102);">Login &nbsp;: <?php echo $report['LOGOWANIE'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a><br>
<a style="color: rgb(102, 102, 102);">CH1 &nbsp;: <?php echo $report['CH1'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a><br>
<a style="color: rgb(102, 102, 102);">CH2 &nbsp;: <?php echo $report['CH2'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a><br>
<a style="color: rgb(102, 102, 102);">CH3 &nbsp;: <?php echo $report['CH3'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a><br>
<a style="color: rgb(102, 102, 102);">CH4 &nbsp;: <?php echo $report['CH4'] ? "<font color='green'>Online</font>" : "<font color='red'>Offline</font>"; ?></a>
</center>

</div>
</li>				
				
			</div>
			<div id="left_3"></div>	
		
			<div id="left_1"></div>
			<div id="left_2">
				<h1>Top 10</h1>
					<li><center><table id="sbRanking" border="0" cellpadding="0" cellspacing="0" width="190">

  <tbody>

    <tr>

      <th class="sbrc1" scope="col">Rank</th>

      <th class="sbrc2" scope="col">Nick</th>

      <th class="sbrc3" scope="col">Lvl</th>

    </tr>
<tr></tr>
<?php 
require_once("config.php");
$database = mysql_select_db("player");
$query = mysql_query("SELECT * FROM player WHERE name NOT LIKE '[GM]%' AND name NOT LIKE '[GA]%'  AND name NOT LIKE '[HA]%' AND name NOT LIKE '[SGM]%' ORDER BY level desc, exp desc limit 10");
$i = 1;

while($player = mysql_fetch_array($query))

            if($player["name"] != GM) {
       
        echo "<tr><td class='sbrc1'>".$i."</td><td class='sbrc2'><a href='profil.php?id=".$player["id"]." '>".$player["name"]."</a></td><td class='sbrc3'> [".$player["level"]."]</td></tr>"; 
           
$i++;
}
 ?>


  </tbody>
</table></center></li>
			</div>
			<div id="left_3"></div>	
		</div>