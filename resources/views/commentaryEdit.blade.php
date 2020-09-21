@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{route('commentary.update', ['id' => $commentary->id, 'postid'=>$commentary->post->id])}}" method="post">
                @csrf
                <textarea name="text" id="text" cols="30" rows="10">{{$commentary->text}}</textarea>
                <input id="button" type="submit" value="Изменить" class="buttons">
                <a href="{{route('home', [])}}">
                    <button type="button" class="btn-info" > Отменить </button>
                </a>
            </form>
        </div>
    </div>
@endsection
