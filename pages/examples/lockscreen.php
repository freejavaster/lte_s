<!DOCTYPE html>
<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "lte";  
$m_id = $_GET["id"];

$all = mysql_connect($host,$username,$password);
mysql_select_db($db) or die(mysql_error());

$sun = mysql_query("SELECT `m_id`, `m_name`, `m_pw`, `m_mail`, `m_pic` FROM `member` WHERE `m_id` = '$m_id'") or die (mysql_error());
$end = mysql_fetch_array($sun);

if(!$sun)
{die("Error: ".mysql_error());}
mysql_close($all);
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Lockscreen</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>
      <!-- User name -->
      <div class="lockscreen-name" id="m_name"><?php echo $end['m_name']; ?></div>

      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="<?php echo $end['m_pic']; ?>" alt="user image" id="m_pic"/>
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <div class="lockscreen-credentials">
          <div class="input-group">
            <input type="password" class="form-control" placeholder="password" id="m_pw"/>
            <input type="hidden" class="form-control" id="m_mail" value="<?php echo $end['m_mail']; ?>"/>
            <div class="input-group-btn">
              <button class="btn" id="clickgo"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </div><!-- /.lockscreen credentials -->

      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center" id="input_info">
        Enter your password to retrieve your session
      </div>
      <div class='text-center'>
        <a href="login.html">Or sign in as a different user</a>
      </div>
      <div class='lockscreen-footer text-center'>
        Copyright &copy; 2014-2015 <b><a href="http://almsaeedstudio.com" class='text-black'>Almsaeed Studio</a></b><br>
        All rights reserved
      </div>
    </div><!-- /.center -->

<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $("#clickgo").click(function(){
      if ($("#m_mail").val()!= "" && $("#m_pw").val()!= "") 
      {
        $.post("../../php/login.php",
        {
          act_log : "login",
          check_m_mail : $("#m_mail").val(),
          check_m_pw : $("#m_pw").val()     
      },
      function(data)
      {
        if (data = "success") 
        {
          window.location.assign("login.html");
        }
        $("#input_info").css("color","red");
        $("#input_info").text(data);
      });
      }
      else 
      {
        $("#input_info").css("color","red");
        $("#input_info").text("Opss!! Wrong info!!");
      }
    });
</script>
</body>
</html>