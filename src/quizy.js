// 解答クリック時の処理
// question_id：問題番号、1問目の場合は[1]を受け取る
// selection_id：回答番号、選択された選択肢の番号を受け取る
// valid_id：正解番号、正解の選択肢の番号を受け取る
// check(1, 1, 2)
//question_id = 1
//selection_id = 1
//valid_id 
function check(question_id, selection_id, valid_id) {

  // クリック無効化
  var answerlists = document.getElementsByName('answerlist_' + question_id);
  answerlists.forEach(answerlist => {
      answerlist.style.pointerEvents = 'none';
  });

  // 選択項目のスタイル設定処理
  // 選択された選択肢の背景色をオレンジ、正解の選択肢を水色に設定
  // 選択された選択肢が正解だった場合は水色で上書きする
  var selectiontext = document.getElementById('answerlist_' + question_id + '_' + selection_id);
  var validtext = document.getElementById('answerlist_' + question_id + '_' + valid_id);
  selectiontext.className = 'answer_invalid';
  validtext.className = 'answer_valid';

   // 正解・不正解の表示設定処理
  var answerbox = document.getElementById('answerbox_' + question_id);
  var answertext = document.getElementById('answertext_' + question_id);
  if (selection_id == valid_id) {
      answertext.className = 'answerbox_valid';
      answertext.innerText = '正解！';
  } else {
      answertext.className = 'answerbox_invalid';
      answertext.innerText = '不正解！';
  }
  answerbox.style.display = 'block';
}
