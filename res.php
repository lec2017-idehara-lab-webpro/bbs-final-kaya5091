<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Response</title>
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

  if( !isset($_GET['res']) || strlen($_GET['res']) == 0 )
    die('無効な呼び出しです</body></html>');

  $resnr = $_GET['res'];
  if( $resnr > 0 )
    print( $resnr . " への返信です。<hr />");
  else
    print( "新規書き込み" );

 if(!isset($_SESSION['login']) || strlen($_SESSION['login'])==0)
   die('返信前に<a href="login.php">ログイン</a>してください。</body></html>');

print "
 <form action='postres.php' method='post'>
   <input type='text' name='mes'>
   <input type='hidden' name='resnr' value='$resnr'>
   <input type='submit'>
 </form>
 ";
?>

  </body>
</html>
