<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
 
mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($db) or die(mysql_error());
 
if(isset($_POST['username'])) {
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
    $res = mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($res) == 1 ){
        echo "Uspješno ste se logirali.";
        exit();
    } else {
        echo "Netočan unos lozinke ili korisničkog imena. Provjerite unos i pokušajte ponovo";
        exit();
    }
}
 
 
?>
