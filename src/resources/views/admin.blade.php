<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
</head>

<body>
    <div class="main">

        <div>
            @if (Auth::user()->role == 0)
            <p>権限なし</p>
            @else
            <h1>編集画面</h1>
            <h2>ユーザ</h2>
            <form action="{{route('user_add')}}" method="POST">
                @csrf
                <p>名前<input type="text" name="first_name"></p>
                <p>苗字<input type="text" name="family_name"></p>
                <p>苗字かな<input type="text" name="family_name_hira"></p>
                <p>名前かな<input type="text" name="first_name_hira"></p>
                <p>メール<input type="text" name="email"></p>
                <p>PW<input type="text" name="password"></p>
                <p>期生<input type="number" name="generation"></p>
                <p>管理者ですか？<input type="number" name="role"></p>
                <input type="submit" value="新規追加">
            </form>
            @foreach ($users as $user)
            <p>{{ $user->first_name }}</p>
            @endforeach
            <h2>コンテンツ</h2>
            <form action="{{route('content_add')}}" method="POST">
                @csrf
                <p>コンテンツ名<input type="text" name="content"></p>
                <p>色<input type="text" name="color_code"></p>
                <input type="submit" value="新規追加">
            </form>
            @foreach ($contents as $content)
            <p>{{ $content->content }}</p>
            <a  href="{{route('content_edit',$content->id)}}">編集</a>
            <a  href="{{route('content_delete',$content->id)}}">削除</a>
            @endforeach
            <h2>言語</h2>
            <form action="{{route('language_add')}}" method="POST">
                @csrf
                <p>言語名<input type="text" name="language"></p>
                <p>色<input type="text" name="color_code"></p>
                <input type="submit" value="新規追加">
            </form>
            @foreach ($languages as $language)
            <p>{{ $language->language }}</p>
            <a  href="{{route('language_edit',$language->id)}}">編集</a>
            <a  href="{{route('language_delete',$language->id)}}">削除</a>
            @endforeach
            @endif
        </div>

    </div>

</body>

</html>
