<?php include "header.php"; ?>
		<div id="right">
			<div id="middle"></div>
			<div id="middle1">
				<h2><?php echo "$NS"; ?> - Zmiana has�a</h2>
<tr><td><p>�<center><?php
	
	if(isset($_POST['change']) && $_POST['change'] == 'Zmie�') {
	
		include('config.php');
			mysql_select_db('account');
			
$user = mysql_real_escape_string($_POST['user']);
$oldpw = mysql_real_escape_string($_POST['oldpw']);
$oldpw2 = mysql_real_escape_string($_POST['oldpw2']);
$newpw = mysql_real_escape_string($_POST['newpw']);
$newpw2 = mysql_real_escape_string($_POST['newpw2']);
$lcold = mysql_real_escape_string($_POST['lcold']);
$lcnew = mysql_real_escape_string($_POST['lcnew']);

	if($oldpw == $oldpw2 && $newpw == $newpw2) {
        
	
		$change = "UPDATE account set password = PASSWORD('" . $newpw . "'), social_id = '" . $lcnew . "' where login = '" . $user . "' and password = PASSWORD('" . $oldpw . "') and social_id = '" . $lcold . "'";
			$result = mysql_query($change);
			
		if($result) {
		echo "<center><br>Zmieni�e� has�o!!<br>"; } else { echo "<center><br>Nie uda�o si� zmieni� has�a, spr�buj znowu!<br>"; }
		echo '<br>Twoje nowe has�o to:<font color="red"><strong> ', $newpw;		
	} else { echo "<center><br>Has�o nie zosta�o zmienione!<br>"; }
	
}
?>
</strong></font>
<br>
<br>
<center><font color="black">
	<form action="zmiana.php" method="post">
                <p style="background-image:url(images/bg.png); height:516px; width:428;  padding:15px;">
<br><br><br><br>
		Login: <br>
		<input type="text" name="user"><br><br>
		Stare has�o: <br>
		<input type="password" name="oldpw"><br><br>
		Powt�rz stare has�o: <br>
		<input type="password" name="oldpw2"><br><br>
		Nowe has�o: <br>
		<input type="password" name="newpw"><br><br>
		Powt�rz nowe has�o: <br>
		<input type="password" name="newpw2"><br><br>
		Stary kod usuni�cia postaci: <br>
		<input type="text" name="lcold"><br><br>
		Nowy kod usuni�cia postaci: <br>
		<input type="text" name="lcnew"><br><br>
	<input type="submit" name="change" value="Zmie�">
	</form>
</center></p></td><td>
			</div>
			<div id="middle2"></div>
		</div>
<?php include "footer.php"; ?>