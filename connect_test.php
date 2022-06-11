<?php

// JSONファイルを読み込み
$path = "./key.json";
$json = file_get_contents($path);
$array = json_decode($json, true);


// 入力するダミーデータを設定
$state = 4;


// 追加するクエリ
$sqlq = "INSERT INTO congestion (state, time) VALUES (:stm, now())";


// PDOの設定
$dsn = $array["dsn"];
$db_user = $array["db_user"];
$db_pass = $array["db_pass"];
$pdo = new PDO($dsn, $db_user, $db_pass);
$stmt = $pdo->prepare($sqlq);

// 実行
$stmt->execute(array(':stm' => $state));

?>