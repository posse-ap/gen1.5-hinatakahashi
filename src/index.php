<?php
include($_SERVER['DOCUMENT_ROOT'] . "/db_connect.php");

$number = $_GET['id'];

$stmt = "SELECT * FROM questions WHERE $number = questions.id";
$questions = $db->query($stmt)->fetchAll();

$stmt = "SELECT name FROM choices WHERE $number = choices.question_id";
$choices = $db->query($stmt)->fetchAll();

foreach ($questions as $question) {

  print_r ($question['name']);
  
}
// foreach ($choices as $choice) {

  var_dump ($choices[1][0]);
  
// }

?>

<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ガチで東京の人しか解けない！#東京の難読地名クイズ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<script src="quizy.js"></script>
</body>
</html> -->
