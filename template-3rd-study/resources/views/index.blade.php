<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ぽっしょアプリ</title>
  <!-- ↓jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <!-- ↓chart.js↓ -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <!-- datalabelsプラグインを呼び出す -->
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="modal.css">
</head>

<body>
  <!-- ヘッダー -->
  <header>
    <h1 class="header">
      <div class="header_left">
        <img src="/img/posseLogo.png" alt="posseロゴ" class="posselogo_img">
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
            <p class="number">{{$today_study_hour}}</p>
            <p class="hour">hour</p>
          </li>
          <li class="studytimeofmonth">
            <p class="whentitle">Month</p>
            <p class="number">{{$month_study_hour}}</p>
            <p class="hour">hour</p>
          </li>
          <li class="studytimeoftotal">
            <p class="whentitle">Total</p>
            <p class="number">{{$total_study_hour}}</p>
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
              @foreach ($languages as $language)
              <li class="languages1">{{$language -> study_language}}</li>
              @endforeach
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
              @foreach ($contents as $content)
              <li class="contents1">{{$content -> study_content}}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <div class="footer">
      <h2> < 2010年 10月 > </h2>
    </div>
  </footer>
  <script src="./index.js"></script>
</body>

<script>
// 学習言語グラフ
var ctx1 = document.getElementById("piechart1");
var piechart1= new Chart(ctx1, {
  type: 'doughnut',
  data: {
    labels: { //データ項目のラベル
      display: false
    },
    datasets: [{
      backgroundColor: [
        @foreach ($languages as $language)
        "{{$language -> language_color}}",
        @endforeach
        ],
      data: [
          @foreach ($studies as $study )
          {{$study -> study_hour}},
          @endforeach
        ] 
    }]
  },
  options: {
    title: { //グラフタイトル
      display: false,
      //↓％表示
      responsive: false,
      plugins: {
        datalabels: {
            color: '#000',
            font: {
                weight: 'bold',
                size: 20,
            },
            formatter: (value, ctx1) => {
                return value + '%';
            },
        }
      }
    }
  }
});

// 学習コンテンツグラフ　
var ctx2 = document.getElementById("piechart2");
var piechart2= new Chart(ctx2, {
  type: 'doughnut',
  data: {
    labels: { //データ項目のラベル 
      display: false 
    },
    datasets: [{
        backgroundColor: [
          @foreach ($contents as $content)
          "{{$content -> content_color}}",
          @endforeach
        ],
        data: [
          @foreach ($studies as $study )
          {{$study -> study_hour}},
          @endforeach
        ] //グラフのデータ
    }]
  },
  options: {
    title: {
      display: false,
      //グラフタイトル
    }
  }
});

//↓棒グラフ
var ctx = document.getElementById("studytime_bargraph").getContext("2d");
    var myBar = new Chart(ctx, {
        type: 'bar',                           //◆棒グラフ
        // lineWidth: 100,
        data: {                                //◆データ
            labels: ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31')],     //ラベル名
            datasets: [{                       //データ設定
                data: [
                ],          //データ内容
                backgroundColor: '#2aaae4'   //背景色
            }
          ],
        },
        options: {                             //◆オプション
            responsive: true,                  //グラフ自動設定
            legend: {                          //凡例設定
                display: false                 //表示設定
          },
            // title: {                           //タイトル設定
            //     display: true,                 //表示設定
            //     fontSize: 18,                  //フォントサイズ
            //     text: 'タイトル'                //ラベル
            // },
            scales: {                          //軸設定
                yAxes: [{                      //y軸設定
                    display: true,             //表示設定
                    scaleLabel: {              //軸ラベル設定
                       display: true,          //表示設定
                      //  labelString: '縦軸ラベル',  //ラベル
                      //  fontSize: 18               //フォントサイズ
                    },
                    ticks: {                      //最大値最小値設定
                        min: 0,                   //最小値
                        max: 30,                  //最大値
                        // fontSize: 18,             //フォントサイズ
                        stepSize: 2,               //軸間隔
                    },
                }],
                xAxes: [{                         //x軸設定
                  　
                    display: true,                //表示設定
                    scaleLabel: {
                      display: true,
                    },
                    barPercentage: 0.5,           //棒グラフ幅
                    categoryPercentage: 0.8,      //棒グラフ幅
                    // scaleLabel: {                 //軸ラベル設定
                    //    display: true,             //表示設定
                      //  labelString: '横軸ラベル',  //ラベル
                    //   //  fontSize: 18               //フォントサイズ
                    // },
                    ticks: {
                      min: 2,
                      max: 30,
                      stepSize: 2
                        // fontSize: 18             //フォントサイズ
                    },
                }],
            },
        },
      });


// モーダル
(function() {
  'use strict';

  var open = document.getElementById('open');
  var close = document.getElementById('close');
  var modal = document.getElementById('modal');
  var mask = document.getElementById('mask');
  // var success = document.getElementById('success');

  open.addEventListener('click', function() {
    modal.className = '';
    mask.className = '';
  });

  close.addEventListener('click', function() {
    modal.className = 'hidden';
    mask.className = 'hidden';
    // success.className = 'hidden';
    // loading.className = 'hidden';
  });

  mask.addEventListener('click', function() {
    // modal.className = 'hidden';
    // mask.className = 'hidden';
    // success.className = 'hidden';
    close.click();
  });
})();

// カレンダー表示
$(function () {
  $('.gakushubi').on('click', () => {
      $('#calendar').toggle(); //toggle←要素を表示なら非表示に、非表示なら表示に切り替える
  });
});

//ローディング画面
$(function () {
  $('.buttonposition').on('click', () => {
      $('#success').show(); 
      $('#modal').hide(); 
  });
});

$(function () {
  $('#mask').on('click', () => {
      $('#success').hide();
  });
});
</script>

</html>