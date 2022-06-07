<?php
session_start();
header('X-FRAME-OPTIONS:DENY');

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

if (isset($_POST['situation1'])) {
    echo '１番を押された';
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



    <form action="connect_test.php" method="POST">
        <button type="button" class="btn btn-secondary btn-lg" name="situation0" value="0">0</button>
        <button type="button" class="btn btn-primary btn-lg" name="situation1" value="1">1</button>
        <button type="button" class="btn btn-info btn-lg" name="situation2" value="2">2</button>
        <button type="button" class="btn btn-success btn-lg" name="situation3" value="3">3</button>
        <button type="button" class="btn btn-warning btn-lg" name="situation4" value="4">4</button>
        <button type="button" class="btn btn-danger btn-lg" name="situation5" value="5">5</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>