<?php
try {
    //1．GET値取得(一行スクリプトを書きましょう！)
    //   ※GET取得の方法はtest2.phpを参照
    $id = $_GET["id"];


    //2．DB接続  //*の箇所を変更！！
    $db = new PDO('sqlite:php.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //上記接続エラーの場合エラーを表示

    //3．SQL検索 //*の箇所を変更！！
    $stmt = $db->prepare('DELETE FROM users WHERE id=:id');
    //4．SQL文のへid値を渡す
    $stmt->bindValue(':id', $id); //削除したいidを渡す
    $stmt->execute();

    header("Location: location.php");     //削除処理完了後に戻るファイル名を記述
    exit();


} catch (PDOException $e) {
    //エラー表示
    $err = $db->errorInfo();
    die($err[2]);
}
?>
