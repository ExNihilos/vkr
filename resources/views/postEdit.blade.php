@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header-pills h4" >
                <div >
                    {{ __('Редактировать') }}
                </div>
            </div>
            <form class="col-md-8 mt-4" method="post" action="{{route('post.update', ['id'=>$post->id])}}">
                @csrf
                <div class="form-group">
                    <label for="title">Название:</label>
                    <input  class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="text">Текст:</label>
                    <textarea class="form-control-range" name="text" id="text" rows="5" placeholder="Введите текст" required>{{$post->text}}</textarea>
                </div>

                <button type="submit" class="btn-success"> Сохранить </button>
                <a href="{{route('home', [])}}">
                <button type="button" class="btn-info" > Отменить  </button>
                </a>
            </form>

        </div>
    </div>
</div>

@endsection
