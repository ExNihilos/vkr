@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-md-8" action="{{route('commentary.update', ['id' => $commentary->id, 'postId'=>$commentary->post->id])}}" method="post">
                @csrf
                <textarea class="form-control-range" name="text" id="text" cols="30" rows="10">{{$commentary->text}}</textarea>
                <div class="mt-4">
                    <input class="btn-success" id="button" type="submit" value="Изменить" class="buttons">
                    <a href="{{route('post.show', ['id' => $commentary->post->id])}}">
                        <button class="btn-danger" type="button" class="btn-info" > Отменить </button>
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
