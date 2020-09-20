<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создать пост</title>
</head>
<body>


<div class= "menu">
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <label for="title" id="postTitle">Название:</label>
        <input type="text" name="title" id="title" required>
        <textarea name="text" id="text" rows="15" cols="70" required></textarea>

        <div class="buttonsDiv" >
            <input id="loadbutton" type="submit" value="Загрузить" class="buttons">
            <input id="clearbutton" type="reset"  value="Очистить" class="buttons">
        </div>
    </form>
</div>

</body>
</html>
