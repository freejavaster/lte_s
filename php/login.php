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
      $sun_arr = mysql_fetch_array($sun);
      $sun_arr["info"] = "login successed !!";

      echo json_encode($sun_arr);
      $_SESSION['m_mail'] = $m_mail;
      $_SESSION['timeout'] = time();//當前時間
    }
    else{echo 'Opss!! Wrong info!!';}

    if(!$sun)
    {die("Error: ".mysql_error());}
    mysql_close($all);
}

//count time to lockscreen
function gettime()
{
  $timeout = $_SESSION['timeout'] + 10*60;
  if ($_SESSION['timeout'] + 10*60 < time())
  {
    echo "timeout";
  }
  else
  {
    echo "Not time out";
  }
}

if (isset($_REQUEST["act_log"])) 
{
    if ($_REQUEST["act_log"] == "login")
    {
      $m_mail = $_POST['check_m_mail'];
      $m_pw = md5($_POST['check_m_pw']);
      logingo($m_mail,$m_pw);
    }
    elseif ($_REQUEST["act_log"] == "count_timeout") 
    {
      gettime();
    }
}

?>