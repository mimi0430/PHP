<?php
//PHPからSQLiteに接続、SELECT文でデータ取得し、PHPで表示文字を作成する方法
try {
    //１．DB接続
    $db = new PDO('sqlite:php.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //２．SQL実行( テーブル：users)
    $stmt = $db->prepare('SELECT * FROM users ORDER BY id DESC');
    $stmt->execute();

    //３．データ取得と表示文字作成
    $view = "";
    while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
        $view .= '<div>';
        $view .= '<a href="delete.php?id='.$row["id"].'">';
        //var_dump($row);
        $view .=$row[3]."|".$row["name"]."|".$row["email"];
        $view .='</a>';
        $view .= '</div>';
    }

} catch (PDOException $e) {
    //エラー表示
    $err = $db->errorInfo();
    die($err[2]);
}
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート：表示画面</title>
</head>
<body>
<a href="users.html">ユーザー新規登録</a>
<h1>USERSテーブル一覧</h1>
<?php
    echo $view;
?>
</body>
</html>
