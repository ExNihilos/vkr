@extends('layouts.app')

@section('content')

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('create')}}" method="get">
    <input type=submit name="but1" id="1">
</form>

@include('inc.posts')
</body>
</html>

@endsection
