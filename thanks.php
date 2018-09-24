<!DOCTYPE html>
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLe>Webアンケート</TITLE>
</HEAD>
<BODY>
  <H2>データベースの扱い（書き込み）</H2>
  <H3>デジカメに関するアンケート</H3>

<?php
  try {
    $dsn = 'mysql:host=localhost;dbname=digicam_q;charset=utf8';
    $user = 'root';
    $password = 'mysql';
    // PDOを生成    
    $dbh = new PDO($dsn, $user, $password);
    // フォームの値を変数に保存
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $job = $_POST['job'];
    $kind = $_POST['kind'];
    $shots = $_POST['shots'];

    echo 'ご回答ありがとうございました。<br />';

    // SQL文を作成
    $sql = 'INSERT INTO num_of_shots(性別,年代,職業,種類,撮影枚数)
            VALUES("'.$gender.'","'.$age.'","'
            .$job.'","'.$kind.'",'.$shots.');';

// print $sql; // デバッグ用

    // SQLを実行
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute();
  } catch(PDOException $e) {
    echo '障害によりご迷惑をおかけしています。<BR />';
    echo 'エラーの内容 : '.
          mb_convert_encoding($e->getMessage(), "UTF-8", "SJIS");

// var_dump($e); // デバッグ用

    echo $e->getCode();
  }
  $dbh = null;  // オブジェクトを破棄
?>
  </BODY>
</HTML>
