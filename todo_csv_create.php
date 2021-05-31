<?php
header('Content-type: application/json; charset=utf-8'); // ヘッダ（JSON指定など）
// データの取り出し]
var_dump($_POST);
$jagacomment = $_POST['jaga_comment']; // 送信元ファイルのname属性を指定
$jaganame = $_POST['jaga_name']; // 送信元ファイルのname属性を指定
var_dump($jaganame);


// 書き込み



$write_data = "{$jaganame},{$jagacomment}\n";

// ファイルを開く 引数はa
$file = fopen('data/jagariko.csv', 'a');

// ロック
flock($file, LOCK_EX);
// データに書き込み
fwrite($file, $write_data);
// ロック解除

flock($file, LOCK_UN);

// ファイルを閉じる
fclose($file);
// 入力画面に移動
header("Location:todo_csv_input.php");
// exit();
