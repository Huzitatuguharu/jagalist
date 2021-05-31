<?php
setlocale(LC_ALL, 'ja_JP.SJIS');

// お菓子API
$url_jaga = 'https://sysbird.jp/toriko/api/?apikey=guest&format=json&keyword=じゃがりこ&max=1&order=r';

// JSON形式に変換
$json_jaga = file_get_contents($url_jaga);
$json_jaga = mb_convert_encoding($json_jaga, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr_jaga = json_decode($json_jaga, true);
$arr_jaga = json_encode($arr_jaga, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <title>じゃがりこ</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- じゃがりこ -->
  <form action="todo_csv_create.php" method="POST">
    <div id="jaga" class="area">
      <div class="jaga_name" name="jaga_name"></div>
      <div class="container">
        <!-- Left content -->
        <div class="container__half" id="left">
          <p class="jaga_img" name="jaga_img"></p>
        </div>

        <!-- Right content -->
        <div class="container__half" id="right">
          <div class="jaga_comment">
          </div>
          <div class="jaga_url" name="jaga_url">
          </div>
        </div>
      </div>

      <div class=jaga_name_send></div>


      <div class="ribbon16-wrapper">
        <span class="ribbon16"><i class="material-icons-round" id="icon_star">
            star
          </i></span>
        <div>
        </div>
        <div class="comment">
          <p>コメント</p>
          <textarea name="jaga_comment" required rows="5"></textarea>
        </div>
        <div class="submitbtn_parent">
          <button class=submitbtn required><i class="material-icons-round">
              add_circle_outline
            </i>リストに追加</button>
        </div>
      </div>

  </form>

  <div class="btnarea">
    <p><a href="" class="againbtn"><i class="material-icons-round" id="icon_search">
          search
        </i>じゃがさがし</a></p>
    <p> <a href="todo_csv_read.php" class="seebtn">
        <i class="material-icons-round">
          import_contacts
        </i>じゃがリスト</a></p>
  </div>

  </div>


  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
    // じゃがりこ
    let jaga = <?php echo $arr_jaga; ?>;
    let jaganame
    console.log(jaga.item);
    console.log(jaga.item.url);
    jaganame = jaga.item.name
    $('.jaga_name').append(`<p name="jaga_name">${jaganame}</p>`);
    jagaimg = jaga.item.image
    $('.jaga_img').append(`<p><img src="${jagaimg}" alt=""></p>`);
    jagacomment = jaga.item.comment
    $('.jaga_comment').append(`<p>${jagacomment}</p>`);

    jagaurl = jaga.item.url
    $('.jaga_url').append(`<p><a href="${jagaurl}" class="morebtn"><i class="material-icons-round">
open_in_new
</i>もっとくわしく</a></p>`);
    $('.jaga_name_send').append(`<input type = "hidden" name="jaga_name" value="${jaganame}">`);
    // 分割
    $(".jaga_name").children().addBack().contents().each(function() {
      if (this.nodeType == 3) {
        var $this = $(this);
        $this.replaceWith($this.text().replace(/(\S)/g, "<span>$&</span>"));
      }
    });

    // 登録ボタン
    $(function() {
      $(".submitbtn").click(function() {
        $(".submitbtn").addClass("onclic", 250, validate);
      });

      function validate() {
        setTimeout(function() {
          $(".submitbtn").removeClass("onclic");
          $(".submitbtn").addClass("validate", 450, callback);
        }, 2250);
      }

      function callback() {
        setTimeout(function() {
          $(".submitbtn").removeClass("validate");
        }, 1250);
      }
    });
  </script>


</body>

</html>
