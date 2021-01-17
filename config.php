<?php

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'btl2');
 



$conn=mysqli_connect('localhost', 'root', '', 'btl2');
if(!$conn){
    die("connect fail ".mysqli_connect_error());
}





?>