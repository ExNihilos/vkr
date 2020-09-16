@extends('layouts.app')
@section('content')
<div class="container">
    <div class="mb-4">
        <h1> {{$post->title}} </h1>
    </div>
    <div class="text-black-50">
        <h4>{{$post->text}}</h4>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                </div>

            </div>

            <form class="col-md-8" action="{{'addCommentary'}}" method="post" style="margin-top: 50px;">
                @csrf

                @foreach($commentaries as $commentary){}
                <div>
                    <h3> {{$commentary->text}} </h3>
                </div>
                @endforeach
                <div class="form-group">
                    <label for="text">Комментарий:</label>
                    <textarea class="form-control-range" name="text" id="text" rows="5" placeholder="Введите текст" required> </textarea>
                </div>
                <button type="submit" class="btn-success"> Добавить </button>
                <button type="reset" class="btn-info"> Очистить </button>
            </form>


</div>
@endsection
