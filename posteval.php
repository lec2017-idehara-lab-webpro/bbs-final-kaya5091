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

  // 「uid, mid, eval の生成を試みる。同じ人が同じ書き込みに２度めの評価をしようとすると、プライマリーキーが衝突するが、その際は評価の値を変更する」という SQL 構文
  // 「on duplicate key 構文」を参照のこと。
  $q = $db->prepare("insert into evals (uid, mid, eval) values (?, ?, ?) on duplicate key update eval=values(eval)");
  $q->bind_param("sdd", $_SESSION['login'], $_GET['mid'], $_GET['eval']);
  $q->execute();
  if( $q->errno != 0 )
    print( $q->error );
  else
    print("登録しました");

  print ("<a href='index.php'>掲示板へ</a>");

 ?>

  </body>
</html>
