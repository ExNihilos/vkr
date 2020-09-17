@extends('layouts.app')
@section('content')
<div class="container">
    <div class="mb-4">
        <h2> Автор: {{$post->user->name}} </h2>
    </div>
    <div class="mb-4">
        <h1> {{$post->title}} </h1>
    </div>
    <div class="text-black-50">
        <h4>{{$post->text}}</h4>
    </div>
    <div>
        <h5>Рейтинг: {{$post->rating}}</h5>
    </div>

    <div>
        <form action="{{route('post.rating', $post->id)}}">
            <button class="btn-outline-primary mt-3" type="submit"> Оценить </button>
        </form>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-8" action="{{route('commentary.store')}}" method="post" style="margin-top: 50px;">
                @csrf
                <div class="form-group">
                    <label for="text"> <h4>Добавить комментарий</h4></label>
                    <textarea class="form-control-range" name="text" id="text" rows="5" placeholder="Введите текст" required> </textarea>
                    <input type="hidden" name="id" id="id" value="{{$post->id}}">
                </div>
                <button type="submit" class="btn-success"> Добавить </button>
                <button type="reset" class="btn-info"> Очистить </button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
             <div class="col-md-8">
                <h4 class="mt-5">Комментарии: </h4>
                 @foreach($post->commentaries as $commentary)
                     <div class="container-md mt-5">
                         <h5 class="bg-primary p-2"> Комментарий от: {{$commentary->user}}</h5>
                         <h4 class="bg-success p-2"> {{$commentary->text}} </h4>
                    </div>
                  @endforeach
             </div>
        </div>
    </div>


@endsection
