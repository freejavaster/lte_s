<?php
error_reporting(0);
$host = "localhost";
$username = "root";
$password = "";
$db = "lte";  

$all = mysql_connect($host,$username,$password);
mysql_select_db($db) or die(mysql_error());

  
  if (isset($_POST["check_mail"]) && $_POST["check_mail"] == 0) {
  $m_mail = $_REQUEST['m_mail'];
  $lte = "SELECT `m_id` FROM `member` WHERE `m_mail` = '$m_mail'"; //執行數據庫後 
  $result = mysql_query($lte); //查詢結果
  $rows = mysql_num_rows($result); //查看幾行
        if ($rows == 1) {
              echo "The user name you entered is already in use!!";
        }
        else {
              echo "Email is available";
        }
 } 

 else{
          $m_name = $_REQUEST['m_name'];
          $m_pw = md5($_REQUEST['m_pw']); //md5 = 加密,無法解密
          $m_mail = $_REQUEST['m_mail'];
          
          $lte = "INSERT INTO `member`(`m_name`, `m_pw`, `m_mail`) VALUES ('$m_name', '$m_pw', '$m_mail')";
          if(mysql_query($lte))
          {
                  echo 'success';
          }
          else
          {
                  echo 'unsuccess';
          }
 }
mysql_close($all);
?>