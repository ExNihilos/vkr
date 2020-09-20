<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="form-group">
    <form action="">
        @csrf
        <div class="form-group">
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" value="{{$post->title}}">

        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea class="form-control-range" name="text" id="text" value="{{$post->text}}" rows="5" placeholder="Введите текст" required> </textarea>
        </div>

    </form>

</div>
</body>
</html>
