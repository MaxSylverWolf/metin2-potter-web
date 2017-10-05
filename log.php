<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php if(isset($_SESSION["UserID"]) && strlen($_SESSION["UserID"])>1){ shop(); }else{login();} function login(){?>
</head>



<body>
<form action="itemshop/default.php" method="post" id="login"> <span>
  
  <div> <input class="fui txt user" name="userid" type="text">

  <input class="fui txt pass" name="password" type="password">

  <input name="Loguj" class="fui btn log" value="Loguj" type="submit">
  <a href="reg.php"><input name="Do³±cz" class="fui btn reg" value="Do³±cz" type="button"></a>  
  <div class="clear"><br>
<br>
  </div>

  </span> </form>

<?php }
function shop(){
echo "
<p style=\"font-size: 11px; \">
&nbsp;&nbsp;&nbsp;Witaj, &nbsp;&nbsp; ".$_SESSION["UserID"]."&nbsp;&nbsp;<br/>
&nbsp;&nbsp;&nbsp;Masz &nbsp;&nbsp;<b>".$_SESSION["cash"]."</b>&nbsp;&nbsp; Slarianskich Monet <br/>
&nbsp;&nbsp;&nbsp;<B>Pytanie:</b>&nbsp;&nbsp;".base64_decode($_SESSION["question1"])."&nbsp;&nbsp;<Br/>";
if(empty($_SESSION["phone1"])) {  

}
else {
echo"
&nbsp;&nbsp;&nbsp;<B>Telefon:</b>&nbsp;&nbsp;".$_SESSION["phone1"]."&nbsp;&nbsp;<br/>";
}
echo"
&nbsp;&nbsp;&nbsp;<B>Email:</b>&nbsp;&nbsp;".$_SESSION["email"]."&nbsp;&nbsp;<Br/>
&nbsp;&nbsp;&nbsp;<B>Twoje ID:</b>&nbsp;&nbsp;".$_SESSION["ID"]."&nbsp;&nbsp;<br><br><hr> <br>
&nbsp;&nbsp;&nbsp;<a href=char.php>Twoje postacie</a><Br/>
&nbsp;&nbsp;&nbsp;<a href=changepsd.php>Zmieñ has³o</a><Br/>
&nbsp;&nbsp;&nbsp;<a href=frogetpsd.php>Przypomnij has³o</a><Br/>
&nbsp;&nbsp;&nbsp;<a href=\"sklep/loginout.php\" class=link>Wyloguj</a>
</p>
";
?>
<?php }?>
</body>
</html>
