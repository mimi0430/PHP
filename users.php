<?php
//PHPからSQLiteに接続、SELECT文でデータ取得し、PHPで表示文字を作成する方法
try {
    //１．DB接続
    $db = new PDO('sqlite:php.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //上記接続エラーの場合エラーを表示

    //２．POST値取得
    $name = $_POST["name"];
    $email = $_POST["email"];
    $seibetu = $_POST["seibetu"];
    $age = $_POST["age"];
    $auth = $_POST["auth"];

    //３．SQL文作成
    $stmt = $db->prepare('INSERT INTO users(name,email,seibetu,age,auth,indate)VALUES(:name,:email,:seibetu,:age,:auth,datetime())');
    //４．SQL文の値へPOST値を渡す
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":seibetu", $seibetu);
    $stmt->bindValue(":age", $age);
    $stmt->bindValue(":auth", $auth);
    $stmt->execute();

    //４．
    $view = '登録完了<br>';
    $view .= '<a href="users_select.php">ユーザーデータ一覧へ</a>';


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
<title>ユーザー登録結果</title>
</head>
<body>
<?php
    echo $view;
?>
</body>
</html>
