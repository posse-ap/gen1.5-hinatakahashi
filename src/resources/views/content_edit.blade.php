<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選択肢編集</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
</head>
<body>
    <div class="main">
            <h1>コンテンツ編集画面</h1>
            <form action="" method="post">
              @csrf
              <input type="hidden" name="id" value="{{$content->id}}">
              <input type="text" name="content" id="" value="{{$content->content}}">
              <input type="text" name="color_code" id="" value="{{$content->color_code}}">
              <input type="submit" value="送信">
            </form>
    </div>

</body>

</html>