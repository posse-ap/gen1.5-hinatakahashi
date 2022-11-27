<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>news画面</h1>

    <?php
    // APIアクセスURL
    $url = 'https://bkrs3waxwg.execute-api.ap-northeast-1.amazonaws.com/default/news';
    
    // ストリームコンテキストのオプションを作成
    $options = [
        // HTTPコンテキストオプションをセット
        'http' => [
            'method' => 'GET',
            'header' => 'Content-type: application/json; charset=UTF-8', //JSON形式で表示
        ],
    ];
    
    // ストリームコンテキストの作成
    $context = stream_context_create($options);
    
    $raw_data = file_get_contents($url, false, $context);
    
    // debug
    //var_dump($raw_data);
    
    // json の内容を連想配列として $data に格納する
    $data = json_decode($raw_data, true);
    ?>
    <table>
        <tr>
            <th>name</th>
            <th>note</th>
        </tr>
        <?php foreach($data as $key => $value){ // 連想配列を取り出す ?>
        <tr>
            <td><a href="{{ route('news_detail', ['id' => $value['id']]) }}"><?php echo $value['title']; ?></a></td>
            <td><?php echo $value['text']; ?></td>
        </tr>
        <?php } ?>
    </table>
    ?>


</body>

</html>
