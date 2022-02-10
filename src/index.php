<?php

include($_SERVER['DOCUMENT_ROOT'] . "/db_connect.php");

$sum_study_time=$db->query('SELECT SUM(study_time) AS sum_study_time FROM study');
$total_study_time=$sum_study_time->fetch();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ぽっしょ</title>
  <!-- ↓jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <!-- 　↓chart.js↓ -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <!-- datalabelsプラグインを呼び出す -->
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="modal.css">
</head>

<body>
  <!-- ヘッダー -->
  <header>
    <h1 class="header">
      <div class="header_left">
        <img src="./img/posselogo-min.png" alt="posseロゴ" class="posselogo_img">
        <!-- <button type="menu" class="button">記録・投稿</button> -->
        <span class="nthweek">4th week</span>
      </div>
      <div id="open">
        記録・投稿
      </div>

      <div id="mask" class="hidden"></div>

      <!-- モーダル -->
      <div id="modal" class="hidden">
        <div id="close">
          <span class="close_button"></span>
        </div>
        <div class="modal_container">
          <div class="modal_left">
            <div class="modal_date">
              <h2>学習日</h2>
              <p class="gakushubi"><input type="text" id="date"></p>
              <div id="calendar"></div>
            </div>
            <div class="modal_contents">
              <h2>学習コンテンツ(複数選択可)</h2>
              <form action="gakushucontents" method="get">
                <input type="checkbox" name="contents" value="1"
                  id="nyobi">N予備校
                <input type="checkbox" name="contents" value="2"
                  id="dotinstall">ドットインストール<br>
                <input type="checkbox" name="contents" value="3"
                  id="possekadai">POSSE課題
              </form>
            </div>
            <div class="modal_languages">
              <h2>学習言語(複数選択可)</h2>
              <form action="gakushugengo" method="get">
                <input type="checkbox" name="languages" value="1"
                  id="HTML">HTML
                <input type="checkbox" name="languages" value="2"
                  id="CSS">CSS
                <input type="checkbox" name="languages" value="3"
                  id="Javascript">Javascript<br>
                <input type="checkbox" name="languages" value="4"
                  id="PHP">PHP
                <input type="checkbox" name="languages" value="5"
                  id="Laravel">Laravel
                <input type="checkbox" name="languages" value="6"
                  id="SQL">SQL
                <input type="checkbox" name="languages" value="7"
                  id="SHELL">SHELL<br>
                <input type="checkbox" name="languages" value="8"
                  id="情報システム基礎知識(その他)">情報システム基礎知識(その他)
              </form>
            </div>
            　
          </div>
          <div class="modal_right">
            <div class="length">
              <h2>学習時間</h2>
              <p><input type="text" id="time"></p>
            </div>
            <div class="comments">
              <h2>Twitter用コメント</h2>
              <p><input type="text" id="comment"></p>
            </div>
            <div class="twitter_btn">
              <input type="checkbox" name="postontwitter"
                class="post_on_twitter">
              <span>Twitterに自動投稿する</span>
            </div>
          </div>
        </div>
        <div class="button_position">
          <button type="menu" class="button">記録・投稿</button>
        </div>
      </div>
      <div id="success" class="hidden">
        <img src="./success.png" class="success_png" alt="完了画面">
      </div>

    </h1>
  </header>
  <main>
    <div class="container">
      <div class="left">
        <div class="items">
          <li class="studytimeoftoday">
            <p class="whentitle">Today</p>
            <p class="number">3</p>
            <p class="hour">hour</p>
          </li>
          <li class="studytimeofmonth">
            <p class="whentitle">Month</p>
            <p class="number">20</p>
            <p class="hour">hour</p>
          </li>
          <li class="studytimeoftotal">
            <p class="whentitle">Total</p>
            <p class="number"><?= $total_study_time["sum_study_time"] ?></p>
            <p class="hour">hour</p>
          </li>
        </div>
        <!-- グラフ -->
        <div class="container_bargraph">
          <canvas id="studytime_bargraph"></canvas>
        </div>
      </div>
      <div class="right">
        <!-- 学習言語グラフ -->
        <div class="languages">
          <div class="gakushugengo">
            <h2>学習言語</h2>
          </div>
          <div class="container_piechart1">
            <canvas id="piechart1"></canvas>
          </div>
          <div>
            <ul>
              <li class="languages1">Javascript</li>
              <li class="languages2">CSS</li>
              <li class="languages3">PHP</li><br>
              <li class="languages4">HTML</li>
              <li class="languages5">Laravel</li>
              <li class="languages6">SQL</li><br>
              <li class="languages7">SHELL</li><br>
              <li class="languages8">情報システム基礎知識(その他)</li>
            </ul>
          </div>
        </div>
        <!-- 学習コンテンツグラフ -->
        <div class="contents">
          <div class="gakushucontents">
            <h2>学習コンテンツ</h2>
            <div class="container_piechart2">
              <canvas id="piechart2"></canvas>
            </div>
            <ul>
              <li class="contents1">ドットインストール</li>
              <li class="contents2">N予備校</li><br>
              <li class="contents3">POSSE課題</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <div class="footer">
      <h2> ＜ 2010年　10月 ＞ </h2>
    </div>
  </footer>
  <script src="./index.js"></script>
</body>

</html>