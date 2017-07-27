<?php
  // 重要：
  // このファイルのファイル名を database.php に変更すること。
  // このままのファイル名で commit/push すると、github で公開されてしまう。
  // username, password を、それぞれ自分のデータベースユーザ名・パスワードに変更する。
  $db = mysqli_connect("iss.edu.tama.ac.jp", "idehara", "test", "idehara");
  mysqli_set_charset($db, 'utf8');
 ?>
