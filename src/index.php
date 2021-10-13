<?php
include($_SERVER['DOCUMENT_ROOT'] . "/db_connect.php");

$number = $_GET['id'];

$stmt = "SELECT * FROM questions WHERE $number = questions.id";
$questions = $db->query($stmt)->fetchAll();


$stmt = "SELECT name FROM choices WHERE $number = choices.question_id";
$choices = $db->query($stmt)->fetchAll(PDO::FETCH_ASSOC); //カラム名だけひっぱる
// print_r($choices);
// exit;

// print_r($choices[0]['name']);
// print_r($choices[1]['name']);
// print_r($choices[2]['name']);
// exit;

foreach ($questions as $question) {

  // print_r ($question['name']);
  
}

// foreach ($choices as $choice) {

//   print_r ($choice['name']);
  
// }
// foreach ($choices as $choice) {

  // var_dump ($choices[1][0]);
  
// }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ガチで東京の人しか解けない！#東京の難読地名クイズ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">

        <div class="quiz">
            <h1><?php print_r ($question['name']); ?></h1>
            <img src="img1.png">
            <ul>
                <li id="answerlist_1_1" name="answerlist_1" class="answerlist" onclick="check(1, 1, 1)"><?php print_r($choices[0]['name']);?></li>
                <li id="answerlist_1_2" name="answerlist_1" class="answerlist" onclick="check(1, 2, 1)"><?php print_r($choices[1]['name']);?></li>
                <li id="answerlist_1_3" name="answerlist_1" class="answerlist" onclick="check(1, 3, 1)"><?php print_r($choices[2]['name']);?></li>
                <li id="answerbox_1" class="answerbox">
                    <span id="answertext_1"></span><br>
                    <span>正解は「<?php print_r($choices[0]['name']);?>」です！</span>
                </li>
            </ul>
        </div>

        <script src="./quizy1.js"></script>
    </div>
</body>

</html>