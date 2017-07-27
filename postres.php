<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>New User</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

<?php
  include_once('database.php');

  if( !isset($_SESSION['login']) || strlen($_SESSION['login']) == 0 )
  {
    print "書き込むまえに、<a href='login.php'>ログイン</a>してください";
    die('</body></html>');
  }


  $q = $db->prepare("insert into messages (uid, body, parent) values (?, ?, ?)");
  $q->bind_param("ssd", $_SESSION['login'], $_POST['mes'], $_POST['resnr']);
  $q->execute();
  if( $q->errno != 0 )
    print( $q->error );
  else
    print("登録しました");

  print ("<a href='index.php'>掲示板へ</a>");

 ?>

  </body>
</html>
