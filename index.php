<?php
session_start();
require_once('funcs.php');

$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM gs_content_table');
$status = $stmt->execute();

$view = '';
if ($status == false) {
    sql_error($stmt);
} else {
    $contents = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>ブログ画面</title>
    <link href="style.css" rel="stylesheet">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="images/free.png" alt="" style="width: 10rem;">
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">TEST1</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">TEST2</a>
                </li>
            </ul>
            <form class="d-flex" action=result.php method="post">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="result">
                <input class="btn btn-outline-success" type="submit" name="submit" value="search"></input>
            </form>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./admin/login.php">ログイン</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="entry.php">新規登録</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

</header>

<body id="main">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($contents as $content): ?>
                    <div class="col">
                        <div class="pst-content shadow-sm">
                            <div class="card-body">
                                <div class="tg">
                                    <p><?= $content['tag'] ?></p>
                                </div>
                                <h3><?= $content['title'] ?></h3>
                                <p class="card-text"><?=nl2br($content['content'])?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">登録:<?= $content['date'] ?></small>
                                </div>
                                <?php if (!is_null($content['update_time'])): ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">更新:<?= $content['update_time'] ?></small>
                                </div>
                                <?php endif ?>
                            </div>
                            <div class="pst">
                                <img src="images/<?= $content['img'] ?>" alt="" class="postimg bd-placeholder-img card-img-top" >
                            </div>
                        </div>
                    </div>
                <!-- </a> -->
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>
</html>
