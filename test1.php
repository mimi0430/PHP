<?php
/**
* 練習
*/

//IDを変数に持たせる
$id = 1;//次のページに持っていくIDを変数に代入
$link = 'リンク';    //リンクに表示される文字列

//HTML文字列を入れる変数
$view = "";
//以下でHTMLリンクを＜作成＞
$view .='<a href="test2.php?id='.$id.'">';
$view .=$link;
$view .='</a>';



//HTMLリンク文字列を＜表示＞
echo $view

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>