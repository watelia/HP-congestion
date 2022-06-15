<?php
// date_default_timezone_set('Asia/Tokyo');
header('X-FRAME-OPTIONS:DENY');

$path = "key.json";
$json = file_get_contents($path);
$array = json_decode($json, true);

$dsn = $array["dsn"];
$db_user = $array["db_user"];
$db_pass = $array["db_pass"];

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    echo "";
} catch (PDOException $e) {
    echo "接続エラー" . $e->getMessage();
}


if (isset($_POST["situation"])) {
    $state = htmlspecialchars($_POST["situation"], ENT_QUOTES, "UTF-8");
    if ($state >= 0 && $state < 6) {
        $sqlq = "INSERT INTO congestion (state, time) VALUES (:stm, CURRENT_TIMESTAMP)";
        $stmt = $pdo->prepare($sqlq);
        $stmt->execute(array(':stm' => $state));
    }
}
?>


<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>混雑表示状況入力</title>
</head>

<body>
    <h1>X▶CUBE　ウェブページ混雑表示状況入力</h1>

    <!-- ここにメインの処理を書く -->
    <form action="input.php" method="POST">
        <input type="submit" name="situation" value="0" class="btn btn-secondary btn-lg">
        <input type="submit" name="situation" value="1" class="btn btn-primary btn-lg">
        <input type="submit" name="situation" value="2" class="btn btn-info btn-lg">
        <input type="submit" name="situation" value="3" class="btn btn-success btn-lg">
        <input type="submit" name="situation" value="4" class="btn btn-warning btn-lg">
        <input type="submit" name="situation" value="5" class="btn btn-danger btn-lg">
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
