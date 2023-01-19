<?php
session_start();
require_once('../funcs.php');
loginCheck();

$title = $_POST['title'];
$tag = $_POST['tag'];
$content  = $_POST['content'];
$img = '';

//画像データがあったらimagesファイルに保存する
if ($_SESSION['post']['image_data'] !== '') {
    // ファイルの名前変える
    $img = date('YmdHis') . '' . $_SESSION['post']['file_name'];
    file_put_contents("../images/$img", $_SESSION['post']['image_data']);
}



// 簡単なバリデーション処理追加。
if (trim($title) === '' || trim($tag) === '' || trim($content) === '') {
    redirect('post.php?error');
}

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_content_table(
                            title, tag, content, img, date
                        )VALUES(
                            :title, :tag, :content, :img, sysdate()
                        )');
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('index.php');
}
