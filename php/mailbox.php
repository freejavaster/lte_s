<?php
session_start();
error_reporting(0);
function dbs()
{
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "lte";  

    $all = mysql_connect($host,$username,$password);
    mysql_select_db($db) or die(mysql_error());
}
function mailbox()
{
  dbs();
  $user_id = 10;
    $sun = mysql_query("SELECT `mail_id`, `m_id`, `mail_toid`, `mail_sub`, `mail_text`, `mail_date`, `mail_read`, `mail_star`, `mail_trash`, `mail_send`, `mail_draft_id` FROM `mailbox` WHERE m_id=10") or die (mysql_error());

    $rows = mysql_num_rows($sun);
    if($rows > 0)
    {
      $r1 = mysql_fetch_array($sun);
      echo json_encode($r1);
    }
    else{echo '';}

    if(!$sun)
    {die("Error: ".mysql_error());}
    mysql_close($all);
}
mailbox();
?>