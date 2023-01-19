<?php
    //データベースへ接続
    $db_name = 'gs_workdb5';    //データベース名
    $db_id   = 'root';      //アカウント名
    $db_pw   = '';      //パスワード：XAMPPはパスワード無しに修正してください。
    $db_host = 'localhost'; //DBホスト
    $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    $sql = "SELECT * FROM gs_content_table WHERE tag='".$_POST["tag"] ");

    $stjmt = $pdo->query($sql);

    fopor
        if(@$_POST["result"] != ){ //  検索入力有無を確認
            $stmt = $pdo->query("SELECT * FROM gs_content_table WHERE tag='".$_POST["tag"] "); //SQL文を実行して、結果を$stmtに代入する。
        };
?>
<html>
<!-- 以下省略 -->