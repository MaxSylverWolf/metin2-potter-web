<?php include "header.php"; ?>
		<div id="right">
			<div id="middle"></div>
			<div id="middle1">
				<h2><?php echo "$NS"; ?> -Profil</h2>
<center><table>
<tr><td></td></tr>
<tr><td><p> <center><?php          $id = $_GET['id'];

                require_once("config.php");
                $database = mysql_select_db("player");
$query = mysql_query("SELECT * FROM player WHERE id = $id");

$i = 0;

while($player = mysql_fetch_array($query)) { ?>
<h2><img src="images/in.jpg" tppabs="01.jpg" alt="" /><span>Profil Postaci <?php echo "".$player["name"].""; ?></span></h2>
<span class="date">Profile postaci</span> </div>
<div class="postui post-con">
<p>  <?php
        echo "<b>Nazwa postaci:</b> ".$player["name"]."<Br/>";
        echo "<b>Czas gry:</b> ".$player["playtime"]." minut<Br/>"; 
echo "<b>Iloœæ Yang:</b> ".$player["gold"]."<Br/>";		
echo "<b>Ostatnio w grze:</b> ".$player["last_play"]."<Br/>";
echo "<b>Królestwo: </b>"; 

$query2 = mysql_query("SELECT * FROM player_index WHERE id LIKE '$player[account_id]'");
				while($player2 = mysql_fetch_array($query2)) {
		if($player2['empire'] == 1) { 
		echo "<font color=red>Shinsoo</font><Br/><BR/>"; 
		}
		elseif($player2['empire'] == 2) {
		echo "<font color=yellow>Chunjo</font><Br/><BR/>"; 
		}
		else {
		echo "<font color=blue>Jinno</font><Br/><BR/>"; 
		}
		}	?></p>
		</div>
		<div class="postui post-end"></div>
		<div class="postui post-title">
		<h2><img src="images/in.jpg" tppabs="01.jpg" alt="" /><span>Profil <?php echo "".$player["name"].""; ?> - Statystyki</span></h2>
<span class="date">Statystyki</span> </div>
<div class="postui post-con"><p>
		<?php
                echo "<b>Poziom:</b> ".$player["level"]." <Br/>";
                echo "<b>Doœwiadczenie:</b> ".$player["exp"]."<Br/>";
if($player['job'] == 0) {
echo "<B>Klasa:</b> Wojownik (Mê¿czyzna)<Br/>"; 
}
elseif($player['job'] == 4) {
echo "<b>Klasa:</b> Wojownik (Kobieta)<Br/>"; 
}
if($player['job'] == 1) {
echo "<b>Klasa:</b> Ninja (Kobieta)<Br/>"; 
}
elseif($player['job'] == 5) {
echo "<b>Klasa:</b> Ninja (Mê¿czyzna)<Br/>"; 
}
if($player['job'] == 2) {
echo "<b>Klasa:</b> Sura (Mê¿czyzna)<Br/>"; 
}
elseif($player['job'] == 6) {
echo "<b>Klasa:</b> Sura (Kobieta)<Br/>"; 
}
if($player['job'] == 3) {
echo "<b>Klasa:</b> Szaman (Kobieta)<Br/>"; 
}
elseif($player['job'] == 7) {
echo "<b>Klasa:</b> Szaman (Mê¿czyzna)<Br/>"; 
}
                echo "<b>Poziom konia:</b> ".$player["horse_level"]."<Br/>";
				echo "<b>Energia ¿yciowa:</b> ".$player["ht"]."<Br/>";
				echo "<b>Inteligencja:</b> ".$player["int"]."<Br/>";
				echo "<b>Si³a:</b> ".$player["st"]."<Br/>";
				echo "<b>Zrêcznoœæ:</b> ".$player["dx"]."<Br/>";
				echo "<b>Punkty ¿ycia:</b> ".$player["hp"]."<Br/>";
				echo "<b>Punkty energii:</b> ".$player["mp"]."<Br/>";
?></center></p>
</center>		</div>
		<div class="postui post-end"></div>
		<div class="postui post-title">
<div class="postui post-con"><p>
<?php
$i++;
}
 ?>  </p></td><td>

</table>
</form>
</div>
			<div id="middle2">
		</div>
<?php include "footer.php"; ?>