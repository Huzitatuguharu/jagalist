# じゃがりすと

- [じゃがりすと](#じゃがりすと)
  - [プロダクトの紹介](#プロダクトの紹介)
  - [こだわった](#こだわった)
    - [文字はじゃがりこサラダ味](#文字はじゃがりこサラダ味)
  - [くるしい](#くるしい)
    - [値渡しPHPとJavaScriptいったりきたり](#値渡しphpとjavascriptいったりきたり)
    - [PHPの配列](#phpの配列)
  - [感想](#感想)

<br>

---
<br>

## プロダクトの紹介

いろんなじゃがりこ見て楽しむ。
<br>

お気に入り登録できる。

お菓子の虜APIへのリベンジ
<br>

JavaScriptだけだとCROSエラーで使えなかったがPHPでは上手くいった。
<br>


https://sysbird.jp/toriko/webapi/
<br>

---
<br>

## こだわった
<br>


### 文字はじゃがりこサラダ味

文字を１文字ずつ分割
<br>


```
    // 分割
    $(".jaga_name").children().addBack().contents().each(function() {
      if (this.nodeType == 3) {
        var $this = $(this);
        $this.replaceWith($this.text().replace(/(\S)/g, "<span>$&</span>"));
      }
    });


```
<br>
👇
<br>
<br>
子要素に対してスタイルを指定
<br>
2n+1は奇数、2nは偶数番目に適用。nの数を変えればいろんなスタイルに活用できる。

```
.jaga_name span:nth-child(2n+1) {
  color: #03A66A;
}
.jaga_name span:nth-child(2n) {
  color: #D92332;
}
```


https://allabout.co.jp/gm/gc/437937/

<br>


---
<br>

## くるしい

### 値渡しPHPとJavaScriptいったりきたり

JavaScript
<br>
👇
<br>
PHP

HTMLの
```
<input type="hidden">
```

で解決

https://code-kitchen.dev/html/input-hidden/

<br>

### PHPの配列
PHPでいじくるより、JavaScriptでいじったほうが早かった。
PHPの書き方に慣れなかった。

<br>


---
<br>

## 感想
リベンジ成功！！
