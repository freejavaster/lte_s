<?php
session_start();
error_reporting(0);
function logingo($m_mail,$m_pw)
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "lte";  

    $all = mysql_connect($host,$username,$password);
    mysql_select_db($db) or die(mysql_error());

    //login
    $sun = mysql_query("SELECT `m_id`, `m_mail` , `m_pw`FROM `member` WHERE `m_mail` = '$m_mail' and `m_pw` = '$m_pw'") or die (mysql_error());

    $rows = mysql_num_rows($sun);
    if($rows == 1)
    {
      //$r1 = mysql_fetch_array($sun);
      //header("Location:index2.html");
      echo 'Success !!';
      $_SESSION['m_mail'] = $m_mail;
      $_SESSION['timeout'] = time();//當前時間
    }
    else{echo 'Opss!! Wrong info!!';}

    if(!$sun)
    {die("Error: ".mysql_error());}
    mysql_close($all);
}
?>