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
include ('config.php'); // Odniesienie Do pliku kt�ry ��czy nas z DB
//jesli byl wyslany formularz przechodzimy do obs�ugi danych
if(isset($_POST['wyslij']))
{

    //Obrabiamy wszystkie zmienne przekazane metod� POST
    foreach ($_POST AS $klucz => $wartosc)
    {
        $wartosc= trim($wartosc);//usuwamy bia�e znaki
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

    
    

//Sprawdzamy czy u�ytkownik o danym usernameie nie jest juz zaj�ty
    $zapytanie_sprawdz_usera= "select * from account where login='$username' ";
$wynik = mysql_query($zapytanie_sprawdz_usera);
if(!$wynik)
{
echo 'Przepraszamy rejestracja w tej chwili jest nie mozliwa. "Zaj�ty login"
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
echo 'Przepraszamy rejestracja w tej chwili jest nie mozliwa. "Zaj�ty e-mail"
.';
exit;
}
if(mysql_num_rows($wynik_email)>0)
{
$sprawdz_email=1;
}
   
    
    //sprawdzamy czy poprawnie jest wype�nine pole ID

    if(empty($username)){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> Pole musi zosta� wype�nione!</font>';
        $blad=true;    
    }
    else if($sprawdz_username==1){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> ID jest zaj�te</font>';
        $blad=true;    
    }
    else if(strlen($username)<5){
        $info_txt_nick.='<font color="#B20000"><font size="1">ID musi zawiera� minimalnie znak�w to 5!</font>';
        $blad=true;
    }
    else if(strlen($username)>30){
        $info_txt_nick.=' <font color="#B20000"><font size="1"> ID mo�e zawiera� maksymalnie 30 znak�w!</font>';
        $blad=true;
		}
    else if($password == $username){
    $info_txt_nick.=' <font color="#B20000"><font size="1">ID nie mo�e by� takie same jak has�o!</font>';
	    }
	
		
    else{
    $info_txt_nick.=' <font color="#207C07"><font size="1">ID jest poprawne</font>';
        }
	  
    //sprawdzamy czy poprawnie jest wypelnione pole Imi�
	if(strlen($real_name)<3){
        $info_txt_realname.='<font color="#B20000"><font size="1">Imi� musi zawiera� minimalnie 3 znaki!</font>';
        $blad=true;
    }
	
	else if(strlen($real_name)>16){
        $info_txt_realname.=' <font color="#B20000"><font size="1"> Imi� mo�e zawiera� maksymalnie 16 znak�w!</font>';
        $blad=true;
    }
    else{
    $info_txt_realname.=' <font color="#207C07"><font size="1">Imi� jest poprawne</font>';
    }
	
	//sprawdzamy czy poprawnie wype�nione jest pole Kod usuni�cia postaci
	if(empty($social_id)){
        $info_txt_socialid.=' <font color="#B20000"><font size="1"> Pole musi zosta� wype�nione!</font>';
        $blad=true;    
    }
	else if(strlen($social_id)<7){
        $info_txt_socialid.='<font color="#B20000"><font size="1"> Kod usuni�cia postaci musi zwiera� 7 znak�w!</font>';
        $blad=true;
    }
	
	else if(strlen($social_id)>7){
        $info_txt_socialid.=' <font color="#B20000"><font size="1"> Kod usuni�cia postaci mo�e zawiera� maksymalnie 7 znak�w!</font>';
        $blad=true;
    }
	else if($password == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usuni�cia postaci nie mo�e by� taki sam jak has�o!</font>';
    }
	else if(1234567 == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usuni�cia postaci jest zbyt �atwy!</font>';
    }
	else if(abcdefg == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usuni�cia postaci jest zbyt �atwy!</font>';
    }
	else if($username == $social_id){
        $info_txt_socialid.=' <font color="#B20000"><font size="1">Kod usuni�cia postaci nie mo�e by� taki sam jak ID!</font>';
    }
	else if(!preg_match('|^[_a-z0-9]{0,7}$|e', $social_id)){
    $info_txt_socialid.=' <font color="#B20000"><font size="1"> Kod usuni�cia postaci mo�e zawiera� tylko cyfry i litery.</font>';
    $blad=true;
        }
    else{
    $info_txt_socialid.=' <font color="#207C07"><font size="1">KUP jest poprwany</font>';
    }
	
	//sprawdzamy czy poprawnie jest wype�nione pole Powt�rz kod usuni�cia postaci
	if(empty($re_social_id)){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1"> Pole musi zosta� wype�nione!</font>';
        $blad=true;
    }
    else if($social_id != $re_social_id){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1"> Kody usuni�cia postaci musz� by� takie same.</font>';
        $blad=true;    
    }    
	else if($password == $re_social_id){
        $info_txt_resocialid.=' <font color="#B20000"><font size="1">Kod usuni�cia postaci nie mo�e by� taki sam jak has�o!</font>';
    }
	
    else{
    $info_txt_resocialid.=' <font color="#B20000"><font color="#207C07"><font size="1">Powt�rzenie kodu usuni�cia postaci jest poprawne</font>';
    }
	
	//sprwadzamy czy poprawnie wype�nione jest pole Telefon
	if(strlen($phone1)<0){
        $info_txt_phone1.='<font color="#B20000"><font size="1"> Telefon musi si� ska�ada� minimalnie z 3 cyfr!</font>';
        $blad=true;
    }
	
	else if(strlen($phone1)>15){
        $info_txt_phone1.=' <font color="#B20000"><font size="1"> Telfon mo�e zawiera� maksymalnie 15 cyfr!.</font>';
        $blad=true;
    }
	else if(!preg_match('|^[0-9. ]*[0-9]{0,15}$|e', $phone1)){
        $info_txt_phone1.=' <font color="#B20000"><font size="1"> Telefon mo�e zawiera� tylko cyfry!</font>';
        $blad=true;
    }
    else{
    $info_txt_phone1.=' <font color="#207C07"><font size="1">Telefon jest poprawny</font>';
    }
	
    //sprawdzamy czy jest prawidlowe Has�o
    if(empty($password)){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Pole musi zosta� wype�nione!</font>';
        $blad=true;
    }
    else if(strlen($password)<=5) {
        $info_txt_password.=' <font color="#B20000"><font size="1"> Has�o musi minimalnie zawiera� 6 znak�w!</font>';
        $blad=true;
    }
    else if(strlen($password)>45){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Has�o mo�e sk�ada� sie z maksymalnie 45 znak�w.</font>';
        $blad=true;
    }
	else if($password == 123456789){
        $info_txt_password.=' <font color="#B20000"><font size="1">Has�o jest zbyt �atwe!</font>';
    }
	else if($password == 123456){
        $info_txt_password.=' <font color="#B20000"><font size="1">Has�o jest zbyt �atwe!</font>';
    }
	else if($socialid == $password){
        $info_txt_password.=' <font color="#B20000"><font size="1">Has�o jest zbyt �atwe!</font>';
    }
	else if(!preg_match('|^[a-z0-9]{0,50}$|e', $password)){
        $info_txt_password.=' <font color="#B20000"><font size="1"> Has�o mo�e zawiera� tylko cyfry i litery.</font>';
        $blad=true;
    }
    else{
    $info_txt_password.=' <font color="#207C07"><font size="1">Has�o jest poprawne</font>';
    }
        
    //sprawdzamy czy jest prawid�owe powt�rzenia has�a 
    if(empty($re_password)){
        $info_txt_re_harlo.=' <font color="#B20000"><font size="1"> Pole musi zosta� wype�nione!</font>';
        $blad=true;
    }
    else if($password != $re_password){
        $info_txt_re_harlo.=' <font color="#B20000"><font size="1"> Has�a musz� by� takie same.</font>';
        $blad=true;    
    }    
    else{
    $info_txt_re_harlo.=' <font color="#B20000"><font color="#207C07"><font size="1">Powt�rzenie has�a jest poprawne</font>';
    }
        
    
    
    //sprawdzamy czy jest podany prawid�owy adres e-mail
    if(empty($answer1)){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Pole musi zosta� wype�nione!</font>';
        $blad=true;    
    }
    else if($sprawdz_email==1){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Na ten adres e-mail zarejestrowane jest ju� jakie� konto!</font>';
        $blad=true;    
    }    
    else if(!preg_match('|^[_a-z0-9.-]*[a-z0-9]@[_a-z0-9.-]*[a-z0-9].[a-z]{2,3}$|e', $email)){
        $info_txt_email.=' <font color="#B20000"><font size="1"> Adres email jest nie prawid�owy. Musi zawiera� praw� i lew� stron� (przyk�ad@przyk�ad.pl).</font>';
        $blad=true;
    }
    else{
        $info_txt_email.=' <font color="#207C07"><font size="1">Adres e-mail jest poprawny</font>';
    }
	//
	if(empty($answer1)){
        $info_txt_answer1.=' <font color="#B20000"><font size="1"> Pole musi zosta� wype�nione!</font>';
        $blad=true;    
    }
	else if(strlen($answer1)<4){
        $info_txt_answer1.='<font color="#B20000"><font size="1"> Odpowied� musi zwiera� minimalnie 5 znak�w!</font>';
        $blad=true;
    }
	
	else if(strlen($answer1)>15){
        $info_txt_answer1.=' <font color="#B20000"><font size="1"> Odpowied� mo�e zawiera� maksymalnie 7 znak�w!</font>';
        $blad=true;
    }
	else if($password == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">Odpowied� nie mo�e by� taka sama jak has�o!</font>';
    }
	else if($username == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">Odpowied� nie mo�e by� taka sama jak ID!</font>';
    }
	else if($social_id == $answer1){
        $info_txt_answer1.=' <font color="#B20000"><font size="1">Odpowied� nie mo�e by� taka sama jak kod usuni�cia postaci!</font>';
    }
    else{
    $info_txt_answer1.=' <font color="#207C07"><font size="1">Odpowied� jest poprwana</font>';
    }


    
if(!$blad)
    {
    //poprawne dane - robmy z nimi co trzeba (zapisujemy do bazy danych itp.)
    $pokaz_form=true;

// Wysy�amy zapytanie do bazy danych    
$zapytanie_add_user = "INSERT INTO account SET login = '".$username."', password = PASSWORD('".$password."'), real_name = '".$rl_name."', email = '".$email."', social_id = '".$social_id."', phone1 = '".$phone1."', question1 = '".$question1."', answer1 = '".$answer1."' ";

// Odpowiedz
$odpowiedz = mysql_query($zapytanie_add_user);
if($odpowiedz > 0){
    echo 'Rejestracja przebieg�a pomy�lnie! Mo�esz teraz korzysta� z Itemshopu, Zmiany has�a oraz mo�esz sie zalogowa� do gry!<br /><Br/>
	<table class=tb border=1><tr><td>ID: </td><td><B>'.$username.'</b></td></tr><tr><td>Has�o:</td><td> <b>'.$password.'</b></td></tr><tr><td>E-mail:</td><Td> <B>'.$email.'</b></td></tr><tr><td>Kod usuni�cia postaci:</td><td> <B>'.$social_id.'</b></td></tr><tr><td>Imi�:</td><Td> <b>'.$real_name.'</b></td></td><tr><td>Telefon:</td><td><B>'.$phone1.'</b></td></tr><tr><td>Odpowied�:</td><td><B>'.$question1.'</b></td></tr><tr><td>Pytanie:</td><td><B>'.$answer1.'</b></td></tr></table>';
}
else{
  $pokaz_form=false;
echo 'Problem z MySQL.';
}
    
    
    }
    else
    {
    //cos jest zle � wy�wietlamy stosowne komunikaty
  //      echo $blad_txt;
  $pokaz_form=false;
    }
}
else
{
    //wypelniamy zmienne pustymi danymi jesli formularz nie zosta� jeszcze wys�any
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
<td>Has�o<font color="red">*</font></td>
<td><input type="password" name="password" value="<?php echo $password; ?>"></td><td>  <?php echo $info_txt_password; ?></td>
</tr>

<tr>
<td>Powt�rz has�o<font color="red">*</font></td>
<td><input type="password" name="re_password" value="<?php echo $re_password; ?>"></td> <td> <?php echo $info_txt_re_harlo; ?></td>
</tr>

<tr>
<td>E-mail<font color="red">*</font></td>
<td><input type="text" name="email" value="<?php echo $email; ?>"></td>  <td><?php echo $info_txt_email; ?></td>
</tr>

<tr>
<td>Imi�<font color="red">*</font></td>
<td><input type="text" name="real_name" value="<?php echo $real_name; ?>"> </td> <td><?php echo $info_txt_realname; ?>  </td>
</tr>
<tr>
<td>Kod usuni�cia postaci<font color="red">*</font></td>
<td><input type="password" name="social_id" maxlength="7" value="<?php echo $social_id; ?>"> </td> <td><?php echo $info_txt_socialid; ?>  </td>
</tr>
<td>Powt�rz kod usuni�cia postaci<font color="red">*</font></td>
<td><input type="password" name="re_social_id" maxlength="7" value="<?php echo $social_id; ?>"> </td> <td><?php echo $info_txt_resocialid; ?>  </td>
</tr>
<td>Telefon</td>
<td><input type="text" name="phone1" value="<?php echo $phone1; ?>"> </td> <td><?php echo $info_txt_phone1; ?>  </td>
</tr>
<td>Pytanie</td>
<td> <select name="question1" background="pliki/input_2.jpg">
                        <option value="Imie_matki"> Imi� matki?</option>
                        <option value="Imie_zwierzaka">Imi� zwierzaka?</option>
                        <option value="Gdzie_sie_urodziles">Gdzie si� urodzi�e�?</option>
                        <option value="Ile_ma_lat_twoj_zwierzak">Ile ma lat tw�j zwierzak?</option>
                        <option value="Tw�j_windows">Tw�j windows?</option>
                      </select></td>
</tr>
<td>Odpowied�</td>
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