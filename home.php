<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

<?php
  include_once('database.php');

  if( isset($_POST['id']) && strlen($_POST['id']) != 0 || isset($_POST['pass']) && strlen($_POST['pass']) != 0 )
  {
    $query = $db->prepare("select password, name from users where uid=?");
    $query->bind_param("s", $_POST['id']);
    $query->bind_result($pass, $name);
    $query->execute();
    if( $query->fetch() ) {
      if($pass == $_POST['pass']){
        $_SESSION['login'] = $_POST['id'];
        $_SESSION['name'] = $name;
        print ("$name さん、こんにちは。<br><br>");
      }
      else {
        print ("<h3>ログイン失敗</h3>");
        print ("<a href='login.php'>ログイン画面へ</a>");
      }
    }
    else {
    print ("<h3>ログイン失敗</h3>");
    print ("<a href='login.php'>ログイン画面へ</a>");
    }
  }else {
    print ("<h3>ログイン失敗</h3>");
    print ("<a href='login.php'>ログイン画面へ</a>");
  }
 ?>

  <br>
  <a href='index.php'>掲示板へ</a>


  </body>
</html>
