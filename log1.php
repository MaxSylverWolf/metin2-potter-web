<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php if(isset($_SESSION["UserID"]) && strlen($_SESSION["UserID"])>1){ shop(); }else{login();} function login(){?>
</head>
<body>
<form action="../sklep/Loginok.php" method="post" id="login"> <span>
  <div> <input class="fui txt user" name="username" type="text"><br>
  <input class="fui txt pass" name="password" type="password"><br>
  <input name="Loguj" class="fui btn log" value="Loguj" type="submit">
  <input name="Do³±cz" class="fui btn reg" value="Do³±cz" type="button">
  <div class="clear"><br>
  </div>
  <a href="../frogetpsd.php" class="sb-link">Zapomnia³e¶ has³a?</a><br>
  <a style="color: rgb(255, 204, 102);" href="../admin/" class="sb-link">Administracja</a> </div>
  </span> </form>
<?php }
function shop(){
echo "
<h3>Informacje o koncie</h3>
<B>ID Konta:</b>&nbsp;&nbsp; ".$_SESSION["UserID"]."&nbsp;&nbsp;<br/>
<B>Ilo¶æ SM:</b>&nbsp;&nbsp;".$_SESSION["cash"]."&nbsp;&nbsp;<br/>
<B>Twoje pytanie:</b>&nbsp;&nbsp;".base64_decode($_SESSION["question1"])."&nbsp;&nbsp;<Br/>
<B>Twój telefon:</b>&nbsp;&nbsp;".$_SESSION["phone1"]."&nbsp;&nbsp;<br/>
<B>Twój email:</b>&nbsp;&nbsp;".$_SESSION["email"]."&nbsp;&nbsp;<Br/>
<B>Twoje ID:</b>&nbsp;&nbsp;".$_SESSION["ID"]."&nbsp;&nbsp;<br/>
<a href=\"itemshop/Loginout.php\" class=link>Wyloguj</a><Br/><br/>
<a href=char.php>Twoje postacie</a><Br/>
<a href=changepsd.php>Zmieñ has³o</a><Br/>
<a href=frogetpsd.php>Przypomnij has³o</a><Br/>
";
?>
<?php }?>
</body>
</html>
