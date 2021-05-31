<?php
//ファイルを変数に入れる
$csv_file = file_get_contents('data/jagariko.csv');

//変数を改行毎の配列に変換
$aryjaga = explode("\n", $csv_file);


$aryCsv = [];
foreach ($aryjaga as $key => $value) {
  //if($key == 0) continue; 1行目が見出しなど、取得したくない場合
  if (!$value) continue; //空白行が含まれていたら除外
  $aryCsv[] = explode(",", $value);
}

?>

<!-- <td><?= htmlspecialchars($todo, ENT_QUOTES); ?></td> -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <title>じゃかりこお気に入り</title>
</head>

<body>
  <div class="jaga_list" id="jagalist_title">じゃがリスト</div>
  <div class="listarea">
    <?php
    for ($i = 0; $i < count($aryCsv); ++$i) {
      echo ' <div class="box30">
    <div class="box-title">';
      echo $aryCsv[$i][0];
      echo '</div>
    <p>';
      echo $aryCsv[$i][1];
      // echo '</td><td>';
      // echo $item[$i]['size'];
      echo '</p>
  </div>';
      // echo "<p value=\"{$aryC/sv[0][$i]}\">{$aryCsv[0][$i]}</option>";
    } ?>
    <p id="jagalist_btn"><a href="todo_csv_input.php" class="againbtn">
        <i class="material-icons-round" id="icon_search">
          search
        </i>じゃがさがし</a></p>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script>
    $(".jaga_list").children().addBack().contents().each(function() {
      if (this.nodeType == 3) {
        var $this = $(this);
        $this.replaceWith($this.text().replace(/(\S)/g, "<span>$&</span>"));
      }
    });


    // 文字
    function BlurTextAnimeControl() {
      $('.jaga_list').each(function() { //blurTriggerというクラス名が
        var elemPos = $(this).offset().top - 50; //要素より、50px上の
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll >= elemPos - windowHeight) {
          $(this).addClass('blur'); // 画面内に入ったらblurというクラス名を追記
        } else {
          $(this).removeClass('blur'); // 画面外に出たらblurというクラス名を外す
        }
      });
    }

    // 画面をスクロールをしたら動かしたい場合の記述
    $(window).scroll(function() {
      BlurTextAnimeControl(); /* アニメーション用の関数を呼ぶ*/
    }); // ここまで画面をスクロールをしたら動かしたい場合の記述

    // 画面が読み込まれたらすぐに動かしたい場合の記述
    $(window).on('load', function() {
      BlurTextAnimeControl(); /* アニメーション用の関数を呼ぶ*/
    }); // ここまで画面が読み込まれたらすぐに動かしたい場合の記述
  </script>
</body>

</html>
