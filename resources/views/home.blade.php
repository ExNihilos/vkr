@extends('layouts.app')

@section('content')

    @if(@errors)
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header-pills h4" >
                <div >
                    {{ __('Создать пост') }}
                </div>
            </div>
        </div>

            <form class="col-md-8" action="{{route('post.store')}}" method="post" style="margin-top: 20px;">
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Введите заголовок" required>
                </div>
                <div class="form-group">
                    <label for="text">Текст</label>
                    <textarea class="form-control-range" name="text" id="text" rows="5" placeholder="Введите текст" required> </textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Теги:</label>
                    <select class="form-control" name="tags[]" id="tags" multiple>
                        @foreach($tags?? [] as $tag)
                            <option>
                                {{$tag->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn-success"> Создать </button>
                <button type="reset" class="btn-info"> Очистить </button>
            </form>

        @include('inc.posts')

        </div>
</div>

@endsection

