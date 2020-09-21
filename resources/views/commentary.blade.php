<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('commentary.store')}}" method="post">
    @csrf
    <textarea name="text" id="text" cols="30" rows="10"> </textarea>
    <input id="button" type="submit" value="Отправить" class="buttons">
</form>
</body>
</html>
