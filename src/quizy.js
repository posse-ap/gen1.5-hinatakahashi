//選択肢
const choices = [
  ["たかなわ", "こうわ", "たかわ"],
  ["かめいど", "かめと", "かめど"],
  ["こうじまち", "おかとまち", "かゆまち"],
  ["おなりもん", "おかどもん", "ごせいもん"],
  ["とどろき", "たたら", "たたりき"],
  ["しゃくじい", "せきこうい", "いじい"],
  ["ぞうしき", "ざっしき", "ざっしょく"],
  ["おかちまち", "みとちょう", "ごしろちょう"],
  ["ししぼね", "しこね", "ろっこつ"],
  ["こぐれ", "こばく", "こしゃく"],
];
console.log(choices,length);

function shuffle(arr) {
  for( let i = arr.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [arr[j], arr[i]] = [arr[i], arr[j]];
  }
  return arr;
};
choices.map(shuffle);

//正解の選択肢
const seikai = [
  "たかなわ","かめいど","こうじまち","おなりもん","とどろき","しゃくじい","ぞうしき","おかちまち","ししぼね","こぐれ",
];

//HTMLの表示
for (let k = 0; k < 10; k++) {
  let one =
  '<div class="container">'
  +'<h2>'
  +`${k+1}. この地名はなんて読む？`
  +'</h2>'
  +`<img src='./img/${k+1}.png' alt='写真'>`
  +'<ul>'
  +`<li id="wrong${k+1}_1" class="list" onclick="check(${k+1},1,1)">`
  +`${choices[k][0]}`
  +'</li>'
  +`<li id="wrong${k+1}_2" class="list" onclick="check(${k+1},2,1)">`
  +`${choices[k][1]}`
  +'</li>'
  +`<li id="wrong${k+1}_3" class="list" onclick="check(${k+1},3,1)">`
  +`${choices[k][2]}`
  +'</li>'
  +'</ul>'
  +`<div id = "commentBox${k+1}" class= "commentbox">`　//もともとnone
  +'<div id = "blue1">'
  + '正解!'
  +'</div>'
  +'<p id="torf" class="answershow">'
  + '正解は「' + `${seikai[k]}` + '」です!'
  +'</p>'
  +'</div>'
  +`<div id = "wrong_commentBox${k+1}" class= "commentbox">`
  +'<div id = "red1">'
  + '不正解!'
  +'</div>'
  +'<p id="torf" class="answershow">'
  + '正解は「' + `${seikai[k]}` + '」です!'
  +'</p>'
  +'</div>'
  +'</div>';

  document.write(one);
};

//関数
function check (id,number,seikai) {　//id=何問目 number=何個めの選択肢 seikai=正解番号
  let clicked = document.getElementById('wrong' + id + '_' + number);　//どこをクリックしたか
  let right = document.getElementById('wrong' + id + '_' + seikai);　//正解がどこにあるか
  let wrong1 = document.getElementById('wrong' + id + '_1'); //１個目の選択肢
  let wrong2 = document.getElementById('wrong' + id + '_2'); //２個目の選択肢
  let wrong3 = document.getElementById('wrong' + id + '_3'); //３個目の選択肢
  let com = document.getElementById("commentBox" + id);　//正解した時の文章
  let wrong_answer = document.getElementById('wrong_commentBox'+ id);　//不正解だった時の文章

if (number == seikai) {
  right.classList.add('blue');
  com.classList.add('commentbox-block');　//display: block;で押した時に表示させる
} else {
  right.classList.add('blue');
  clicked.classList.add ('red'); 
  wrong_answer.classList.add('commentbox-block');
};

//再度クリックできないようにする
wrong1.classList.add('cantclick');
wrong2.classList.add('cantclick');
wrong3.classList.add('cantclick');
};