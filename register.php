<?php include "header.php"; ?>
		<div id="right">
			<div id="middle"></div>
			<div id="middle1">
				<h2>Rejestracja</h2>
<div class="content">
<form method="post" name="form" action="#">
<table>
<tr><td></td></tr>
<tr><td><center>			<?php
include ('config.php'); // Odniesienie Do pliku który ³±czy nas z DB
//jesli byl wyslany formularz przechodzimy do obs³ugi danych
if(isset($_POST['wyslij']))
{

    //Obrabiamy wszystkie zmienne przekazane metod± POST
    foreach ($_POST AS $klucz => $wartosc)
    {
        $wartosc= trim($wartosc);//usuwamy bia³e znaki
          if (get_magic_quotes_gpc()) 
              $wartosc= stripslashes($wartosc);
        $wartosc=htmlspecialchars($wartosc, ENT_QUOTES);
        $_POST[$klucz]=$wartosc;
    }

    $username=$_POST['username'];
    $password=$_POST['password'];
    $re_password=$_POST['re_password'];
    $email=$_POST['email'];
	$real_name=$_POST['real_name'];
	$social_id=$_POST['social_id'];
	$re_social_id=$_POST['re_social_id'];
	$phone1=$_POST['phone1'];
	$code2=$_POST['code2'];
	$code=$_POST['code'];
	$question1=$_POST["question1"];

	$answer1=$_POST['answer1'];
    
    $blad_txt='';
    $blad=false;

    
    

//Sprawdzamy czy u¿ytkownik o danym usernameie nie jest juz zajêty
    $zapytanie_sprawdz_usera= "select * from account where login='$username' ";
$wynik = mysql_query($zapytanie_sprawdz_usera);
if(!$wynik)
{
echo 'Przepraszamy rejestracja w tej chwili jest nie mozliwa. "Zajêty login"
.';
exit;
}
if(mysql_num_rows($wynik)>0)
{
$sprawdz_username=1;
}

// Sprawdzamy czy adres email sie nie powtarza.
    $zapytanie_sprawdz_email= "select * from account where email ='$email' ";
$wynik_email = mysql_query($zapytanie_sprawdz_email);
if(!$wynik_email)
{
echo 'Przepraszamy rejestracja w tej chwili jest nie mozliwa. "Zajêty e-mail"
.';
exit;
}
if(mysql_num_rows($wynik_email)>0)
{
$sprawdz_email=1;
}
   
    
    //sprawdzamy czy poprawnie jest wype³nine pole ID

    if(empty($username)){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> Pole musi zostaæ wype³nione!</font>';
        $blad=true;    
    }
    else if($sprawdz_username==1){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> ID jest zajête</font>';
        $blad=true;    
    }
    else if(strlen($username)<5){
        $info_txt_nick.='<font color="#B20000"><font size="1">ID musi zawieraæ minimalnie znaków to 5!</font>';
        $blad=true;
    }
    else if(strlen($username)>30){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> ID mo¿e zawieraæ maksymalnie 30 znaków!</font>';
        $blad=true;
		}
    else if($password == $username){
    $info_txt_nick.=' <font color="#B20000"><font size="1">ID nie mo¿e byæ takie same jak has³o!</font>';
	    }
	
		
    else{
    $info_txt_nick.=' <font color="#207C07"><font size="1">ID jest poprawne</font>';
        }
	  
    //sprawdzamy czy poprawnie jest wypelnione pole Imiê
	if(strlen($real_name)<3){
        $info_txt_realname.='<font color="#B20000"><font size="1">Imiê musi zawieraæ minimalnie 3 znaki!</font>';
        $blad=true;
    }
	
	else if(strlen($real_name)>16){
        $info_txt_realname.=' <font color="#B20000"><font size="1"> Imiê mo¿e zawieraæ maksymalnie 16 znaków!</font>';
        $blad=true;
    }
    else{
    $info_txt_realname.=' <font color="#207C07"><font size="1">Imiê jest poprawne</font>';
    }
	
	//sprawdzamy czy poprawnie wype³nione jest pole Kod usuniêcia postaci
	if(empty($social_id)){
        $info_txt_socialid.=' <font color="#B20000"><font size="1"> Pole musi zostaæ wype³nione!</font>';
        $blad=true;    
    }
	else if(strlen($social_id)<7){
        $info_txt_socialid.='<font color="#B20000"><font size="1"> Kod usuniêcia postaci musi zwieraæ 7 znaków!</font>';
        $blad=true;
    }
	
	else if(strlen($social_id)>7){
        $info_txt_socialid.=' <font color="#B20000"><font size="1"> Kod usuniêcia postaci mo¿e zawieraæ maksymalnie 7 znaków!</font>';
        $blad=true;
    }
	else if($password == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usuniêcia postaci nie mo¿e byæ taki sam jak has³o!</font>';
    }
	else if(1234567 == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usuniêcia postaci jest zbyt ³atwy!</font>';
    }
	else if(abcdefg == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usuniêcia postaci jest zbyt ³atwy!</font>';
    }
	else if($username == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usuniêcia postaci nie mo¿e byæ taki sam jak ID!</font>';
    }
	else if(!preg_match('|^[_a-z0-9]{0,7}$|e', $social_id)){
    $info_txt_socialid.=' <font color="#B20000"><font size="1"> Kod usuniêcia postaci mo¿e zawieraæ tylko cyfry i litery.</font>';
    $blad=true;
        }
    else{
    $info_txt_socialid.=' <font color="#207C07"><font size="1">KUP jest poprwany</font>';
    }
	
	//sprawdzamy czy poprawnie jest wype³nione pole Powtórz kod usuniêcia postaci
	if(empty($re_social_id)){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1"> Pole musi zostaæ wype³nione!</font>';
        $blad=true;
    }
    else if($social_id != $re_social_id){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1"> Kody usuniêcia postaci musz± byæ takie same.</font>';
        $blad=true;    
    }    
	else if($password == $re_social_id){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1">Kod usuniêcia postaci nie mo¿e byæ taki sam jak has³o!</font>';
    }
	
    else{
    $info_txt_resocialid.=' <font color="#B20000"><font color="#207C07"><font size="1">Powtórzenie kodu usuniêcia postaci jest poprawne</font>';
    }
	
	//sprwadzamy czy poprawnie wype³nione jest pole Telefon
	if(strlen($phone1)<0){
        $info_txt_phone1.='<font color="#B20000"><font size="1"> Telefon musi siê ska³adaæ minimalnie z 3 cyfr!</font>';
        $blad=true;
    }
	
	else if(strlen($phone1)>15){
        $info_txt_phone1.=' <font color="#B20000"><font size="1"> Telfon mo¿e zawieraæ maksymalnie 15 cyfr!.</font>';
        $blad=true;
    }
	else if(!preg_match('|^[0-9. ]*[0-9]{0,15}$|e', $phone1)){
        $info_txt_phone1.=' <font color="#B20000"><font size="1"> Telefon mo¿e zawieraæ tylko cyfry!</font>';
        $blad=true;
    }
    else{
    $info_txt_phone1.=' <font color="#207C07"><font size="1">Telefon jest poprawny</font>';
    }
	
    //sprawdzamy czy jest prawidlowe Has³o
    if(empty($password)){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Pole musi zostaæ wype³nione!</font>';
        $blad=true;
    }
    else if(strlen($password)<=5) {
        $info_txt_password.=' <font color="#B20000"><font size="1"> Has³o musi minimalnie zawieraæ 6 znaków!</font>';
        $blad=true;
    }
    else if(strlen($password)>45){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Has³o mo¿e sk³adaæ sie z maksymalnie 45 znaków.</font>';
        $blad=true;
    }
	else if($password == 123456789){
        $info_txt_password.=' <font color="#B20000"><font size="1">Has³o jest zbyt ³atwe!</font>';
    }
	else if($password == 123456){
        $info_txt_password.=' <font color="#B20000"><font size="1">Has³o jest zbyt ³atwe!</font>';
    }
	else if($socialid == $password){
        $info_txt_password.=' <font color="#B20000"><font size="1">Has³o jest zbyt ³atwe!</font>';
    }
	else if(!preg_match('|^[a-z0-9]{0,50}$|e', $password)){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Has³o mo¿e zawieraæ tylko cyfry i litery.</font>';
        $blad=true;
    }
    else{
    $info_txt_password.=' <font color="#207C07"><font size="1">Has³o jest poprawne</font>';
    }
        
    //sprawdzamy czy jest prawid³owe powtórzenia has³a 
    if(empty($re_password)){
        $info_txt_re_harlo.=' <font color="#B20000"><font size="1"> Pole musi zostaæ wype³nione!</font>';
        $blad=true;
    }
    else if($password != $re_password){
        $info_txt_re_harlo.=' <font color="#B20000"><font size="1"> Has³a musz¹ byæ takie same.</font>';
        $blad=true;    
    }    
    else{
    $info_txt_re_harlo.=' <font color="#B20000"><font color="#207C07"><font size="1">Powtórzenie has³a jest poprawne</font>';
    }
        
    
    
    //sprawdzamy czy jest podany prawid³owy adres e-mail
    if(empty($answer1)){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Pole musi zostaæ wype³nione!</font>';
        $blad=true;    
    }
    else if($sprawdz_email==1){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Na ten adres e-mail zarejestrowane jest ju¿ jakie¶ konto!</font>';
        $blad=true;    
    }    
    else if(!preg_match('|^[_a-z0-9.-]*[a-z0-9]@[_a-z0-9.-]*[a-z0-9].[a-z]{2,3}$|e', $email)){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Adres email jest nie prawid³owy. Musi zawieraæ praw± i lew± stronê (przyk³ad@przyk³ad.pl).</font>';
        $blad=true;
    }
    else{
        $info_txt_email.=' <font color="#207C07"><font size="1">Adres e-mail jest poprawny</font>';
    }
	//
	if(empty($answer1)){
        $info_txt_answer1.=' <font color="#B20000"><font size="1"> Pole musi zostaæ wype³nione!</font>';
        $blad=true;    
    }
	else if(strlen($answer1)<4){
        $info_txt_answer1.='<font color="#B20000"><font size="1"> OdpowiedŸ musi zwieraæ minimalnie 5 znaków!</font>';
        $blad=true;
    }
	
	else if(strlen($answer1)>15){
        $info_txt_answer1.=' <font color="#B20000"><font size="1"> OdpowiedŸ mo¿e zawieraæ maksymalnie 7 znaków!</font>';
        $blad=true;
    }
	else if($password == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">OdpowiedŸ nie mo¿e byæ taka sama jak has³o!</font>';
    }
	else if($username == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">OdpowiedŸ nie mo¿e byæ taka sama jak ID!</font>';
    }
	else if($social_id == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">OdpowiedŸ nie mo¿e byæ taka sama jak kod usuniêcia postaci!</font>';
    }
    else{
    $info_txt_answer1.=' <font color="#207C07"><font size="1">OdpowiedŸ jest poprwana</font>';
    }


    
if(!$blad)
    {
    //poprawne dane - robmy z nimi co trzeba (zapisujemy do bazy danych itp.)
    $pokaz_form=true;

// Wysy³amy zapytanie do bazy danych    
$zapytanie_add_user = "INSERT INTO account SET login = '".$username."', password = PASSWORD('".$password."'), real_name = '".$rl_name."', email = '".$email."', social_id = '".$social_id."', phone1 = '".$phone1."', question1 = '".$question1."', answer1 = '".$answer1."' ";

// Odpowiedz
$odpowiedz = mysql_query($zapytanie_add_user);
if($odpowiedz > 0){
    echo 'Rejestracja przebieg³a pomyœlnie! Mo¿esz teraz korzystaæ z Itemshopu, Zmiany has³a oraz mo¿esz sie zalogowaæ do gry!<br /><Br/>
	<table class=tb border=1><tr><td>ID: </td><td><B>'.$username.'</b></td></tr><tr><td>Has³o:</td><td> <b>'.$password.'</b></td></tr><tr><td>E-mail:</td><Td> <B>'.$email.'</b></td></tr><tr><td>Kod usuniêcia postaci:</td><td> <B>'.$social_id.'</b></td></tr><tr><td>Imiê:</td><Td> <b>'.$real_name.'</b></td></td><tr><td>Telefon:</td><td><B>'.$phone1.'</b></td></tr><tr><td>Odpowied¼:</td><td><B>'.$question1.'</b></td></tr><tr><td>Pytanie:</td><td><B>'.$answer1.'</b></td></tr></table>';
}
else{
  $pokaz_form=false;
echo 'Problem z MySQL.';
}
    
    
    }
    else
    {
    //cos jest zle – wy¶wietlamy stosowne komunikaty
  //      echo $blad_txt;
  $pokaz_form=false;
    }
}
else
{
    //wypelniamy zmienne pustymi danymi jesli formularz nie zosta³ jeszcze wys³any
    $username='';
    $password='';
    $re_password='';
    $email='';
	$real_name='';
	$social_id='';
	$re_social_id='';
	$phone1='';
	$code2='';
	$code='';
	$question1='';
	$answer1='';
}
//wyswietlamy formularz
if($pokaz_form!=true){
?>
<!-- FOLMULARZ -->
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"><center>
<table border=0 class="reje">
<tr>
<td>ID<font <font color="red">*</font></td><td><input type="text" name="username" value="<?php echo $username; ?>"></td><td><?php echo $info_txt_nick; ?></td>
</tr>
<tr>
<td>Has³o<font color="red">*</font></td>
<td><input type="password" name="password" value="<?php echo $password; ?>"></td><td>  <?php echo $info_txt_password; ?></td>
</tr>

<tr>
<td>Powtórz has³o<font color="red">*</font></td>
<td><input type="password" name="re_password" value="<?php echo $re_password; ?>"></td> <td> <?php echo $info_txt_re_harlo; ?></td>
</tr>

<tr>
<td>E-mail<font color="red">*</font></td>
<td><input type="text" name="email" value="<?php echo $email; ?>"></td>  <td><?php echo $info_txt_email; ?></td>
</tr>

<tr>
<td>Imiê<font color="red">*</font></td>
<td><input type="text" name="real_name" value="<?php echo $real_name; ?>"> </td> <td><?php echo $info_txt_realname; ?>  </td>
</tr>
<tr>
<td>Kod usuniêcia postaci<font color="red">*</font></td>
<td><input type="password" name="social_id" maxlength="7" value="<?php echo $social_id; ?>"> </td> <td><?php echo $info_txt_socialid; ?>  </td>
</tr>
<td>Powtórz kod usuniêcia postaci<font color="red">*</font></td>
<td><input type="password" name="re_social_id" maxlength="7" value="<?php echo $social_id; ?>"> </td> <td><?php echo $info_txt_resocialid; ?>  </td>
</tr>
<td>Telefon</td>
<td><input type="text" name="phone1" value="<?php echo $phone1; ?>"> </td> <td><?php echo $info_txt_phone1; ?>  </td>
</tr>
<td>Pytanie</td>
<td> <select name="question1" background="pliki/input_2.jpg">
                        <option value="Imie_matki"> Imiê matki?</option>
                        <option value="Imie_zwierzaka">Imiê zwierzaka?</option>
                        <option value="Gdzie_sie_urodziles">Gdzie siê urodzi³e¶?</option>
                        <option value="Ile_ma_lat_twoj_zwierzak">Ile ma lat twój zwierzak?</option>
                        <option value="Twój_windows">Twój windows?</option>
                      </select></td>
</tr>
<td>OdpowiedŸ</td>
<td><input type="text" name="answer1" value="<?php echo $answer1; ?>" > </td> <td><?php echo $info_txt_answer1; ?>  </td>
</tr>
<script language="JavaScript"><!--
ts = <?= $ts ?>;
--></script>
<?
session_start();
$ts = time();
?>
<td></td><td><input type="submit" name="wyslij" value="Zarejestruj" class="button" readonly="" /> </td>
</tr><td>Rejestrujac sie akceptujesz nasz <strong><a href="regulamin.php" target="_blank">REGULAMIN</a></strong></td>
</table></center>
</form>
<!-- KONIEC FOLMULARZA -->
<?php 
}
else{
return false;
}
?></center>
</td><td>

</table>
</form>
</div>
			<div id="middle2"></div>
		</div>
<?php include "footer.php"; ?>