<?php 
                $mysql_host         = "ip hosta z 100";
                $mysql_user         = "root";
                $mysql_pass         = "has³o do roota";
                $mysql_db           = "account";
                
                mysql_connect($mysql_host, $mysql_user, $mysql_pass) OR
                die("Nie mozna polaczyc sie z baza danych<br /> B³?d: ".mysql_error());        
                
                mysql_select_db($mysql_db) OR
                die("W bazie danych nie moga byc wykorzystane.<br /> B³?d: ".mysql_error()); 
                ?>