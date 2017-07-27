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

  print "
    <form action='posteval.php' method='get'>
    {$_GET['mid']} への評価：<input type=text name=eval value=0>
    <input type=hidden name=mid value={$_GET['mid']}><input type='submit'>
    </form>
  ";
 ?>

  </body>
</html>
