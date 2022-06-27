<?php include(__DIR__ . '/init.php'); ?>
<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <title>タイトル</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#fff">
  <meta name="description" content="ディスクリプション">
  <link rel="canonical" href="">

  <!--=============== ▼FAVICON NORMAL ===============-->
  <link rel="apple-touch-icon-precomposed" sizes="180x180" href="">
  <link rel="shortcut icon" href="">
  <link rel="icon" sizes="16x16" href="">
  <link rel="icon" sizes="32x32" href="">

  <!--=============== ▼FAVICON SVG ===============-->
  <link rel="apple-touch-icon-precomposed" sizes="180x180" href="" type="image/svg+xml">
  <link rel="shortcut icon" href="" type="image/svg+xml">
  <link rel="icon" sizes="16x16" href="" type="image/svg+xml">
  <link rel="icon" sizes="32x32" href="" type="image/svg+xml">

  <!--=============== ▼GOOGLE FONTS ===============-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" media="print" onload="this.media='all'">

  <!--=============== ▼CSS ===============-->
  <link rel="stylesheet" href="/assets/css/styles.css">

  <!--=============== ▼DEFAULT OGP ===============-->
  <meta property="og:locale" content="ja_JP">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="">
  <meta property="og:url" content="">
  <meta property="og:title" content="タイトル">
  <meta property="og:description" content="ディスクリプション">
  <meta property="og:image" content="絶対パスで指定　W1200px×H630pxがベスト">

  <!--=============== ▼TWITTER OGP ===============-->
  <meta name="twitter:site" content="@アカウント名">
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="タイトル">
  <meta property="twitter:description" content="ディスクリプション">
  <meta property="twitter:image" content="絶対パスで指定　W1200px×H630pxがベスト">

  <!--=============== ▼GOOGLE ANALYTICS ===============-->
  <?php part("analytics"); ?>

</head>

<body>
  <div id="top" class="p-top wrap-all">

    <!--=============== ▼HEADER ===============-->
    <?php part("header"); ?>
    <img src="" alt="" width="" height="" loading="" decoding="" oncontextmenu="return false;" onselectstart="return false;" onmousedown="return false;">

    <!--=============== ▼MAIN ===============-->
    <main class="p-main">
      <section class="p-news">
        <div class="p-news__inner">
          <article class="p-news__article">
            <h1 class="p-news__heading test">testtesttesttest</h1>
            <ul class="p-news__list">
              <li class="p-news__list-item">
                <span class="p-news__label">通常ラベル</span>
              </li>
              <li class="p-news__list-item">
                <span class="p-news__label--red">赤ラベル</span>
              </li>
            </ul>
            <figure>
              <img src="https://picsum.photos/seed/picsum/500/350" alt="の画像" class="p-news__thumbnail" width="" height="" loading="lazy" decoding="async" oncontextmenu="return false;" onselectstart="return false;" onmousedown="return false;">
            </figure>
            <figure>
              <img src="/assets/images/top/service.jpg?as=webp" alt="の画像" class="p-news__thumbnail" width="" height="" loading="lazy" decoding="async" oncontextmenu="return false;" onselectstart="return false;" onmousedown="return false;">
            </figure>
            <p class="p-news__text">ニュース記事</p>
            <a href="" class="p-news__link" target="_blank" rel="noopener noreferrer">詳しくはこちら</a>
          </article><!-- /.p-news--article -->
        </div><!-- /.p-news--inner -->
      </section><!-- /.p-news -->
    </main><!-- /.main -->

    <!--=============== ▼FOOTER ===============-->
    <?php part("footer"); ?>
  </div>

  <!--=============== ▼JS ===============-->
  <?php part("scripts"); ?>
</body>

</html>
