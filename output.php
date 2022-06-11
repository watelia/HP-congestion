<?php
header('X-FRAME-OPTIONS:DENY');


$path = "key.json";
$json = file_get_contents($path);
$array = json_decode($json, true);

$dsn = $array["dsn"];
$db_user = $array["db_user"];
$db_pass = $array["db_pass"];

$id = 1;

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    echo "接続完了";
} catch (PDOException $e) {
    echo "接続エラー" . $e->getMessage();
}

$sqlq = "SELECT state,time FROM congestion ORDER BY id DESC LIMIT :id;";

$stmt = $pdo->prepare($sqlq);

$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$res = $stmt->execute();

if ($res) {
    $data = $stmt->fetch();
}

date_default_timezone_set('Asia/Tokyo');
$timestamp = strtotime($data["time"]);
$time = strtotime('now');
$countertime = strtotime("-9 hour");
$timediff = $countertime - $timestamp;

$situation = "";

?>


<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>混雑表示状況出力</title>
</head>

<body>
    <h1>X▶CUBE　ウェブページ混雑表示状況表示</h1>

    <main>
        <?php if ($timediff <= 7200) {
            $situation = $data["state"];
            switch ($situation) {
                case 0:
                    echo '<div class="alert alert-secondary" role="alert"><strong>混雑は０！</strong><div>';
                    break;
                case 1:
                    echo '<div class="alert alert-primary" role="alert"><strong>混雑は１！</strong><div>';
                    break;
                case 2:
                    echo '<div class="alert alert-info" role="alert"><strong>混雑は２！</strong><div>';
                    break;
                case 3:
                    echo '<div class="alert alert-success" role="alert"><strong>混雑は３！</strong><div>';
                    break;
                case 4:
                    echo '<div class="alert alert-warning" role="alert"><strong>混雑は４！</strong><div>';
                    break;
                case 5:
                    echo '<div class="alert alert-danger" role="alert"><strong>混雑は５！</strong><div>';
                    break;
                default:
                    echo '<div class="alert alert-secondary" role="alert"><strong>混雑は０！</strong><div>';
                    break;
            }
        } else {
            $situation = 0;
            echo '<div class="alert alert-secondary" role="alert"><strong>混雑は０！</strong><div>';
        }
        ?>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>
