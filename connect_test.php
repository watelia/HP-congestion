<?php

// JSONファイルを読み込み
$path = "./key.json";
$json = file_get_contents($path);
$array = json_decode($json, true);


// 入力するダミーデータを設定
// idはオートインクリメントなので何も入力しない
$state = 4;


// 追加するクエリ
$sqlq1 = "INSERT INTO congestion (state, time) VALUES (:stm, now())";


// PDOの設定
$dsn = $array["dsn"][0];
$db_user = $array["db_user"][0];
$db_pass = $array["db_pass"][0];
$pdo = new PDO($dsn, $db_user, $db_pass);
$stmt = $pdo->prepare($sqlq1);

// 実行
$stmt->execute(array(':stm' => $state));


// $sqlq2 = "SELECT * FROM congestion ORDER BY id DESC LIMIT " . $number . ";";

// $stmt = $pdo->prepare($sqlq2);

// $stmt->execute();

// $result = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($number);
