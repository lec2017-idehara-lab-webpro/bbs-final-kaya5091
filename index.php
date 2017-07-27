<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>掲示板</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

<h1>多摩大 掲示板</h1>

<?php
  if( isset($_SESSION['login']) && strlen($_SESSION['login'])>0 )
    print "{$_SESSION['name']} としてログイン中です。";
  print "<a href='login.php'>LOGIN</a>";
?>

<br>

<table>
  <tr>

  </tr>
</table>

<?php
  include_once('database.php');

  $result = $db->query("select mid, uid, body, parent, timestamp, name from messages left join users using (uid) order by mid asc");
  while ( $mes = $result->fetch_assoc()) {
    $reslink = "res.php?res={$mes['mid']}";
    print("<a href='$reslink'>{$mes['mid']} </a> ");

    print( $mes['name'] . " : ");
    if( $mes['parent'] != 0 )
      print ">" . $mes['parent'] . " ";
    print($mes['timestamp']);

    print( "<a href='eval.php?mid={$mes['mid']}'> 評価</a>");

    print ("<br />");
    print( "<h3>{$mes['body']}</h3>");
    print ("<br />");
    print ("<br />");
  }
  $result->close();
 ?>

  <form action='res.php' method='GET'>
    <input type=hidden name=res value='0'>
    <input type=submit value='新規書き込み'>
  </form>


  </body>
</html>
