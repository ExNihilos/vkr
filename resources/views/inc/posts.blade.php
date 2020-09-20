{{--use \Illuminate\Support\Facades\Auth --}}
<div class="container" id="posts">
        <div class="mt-5" style="border-bottom:3px solid">
            <label for="posts" id="lab"> <h3>Посты:</h3> </label>

            <form class="col-md-8" action="{{route('post.sort', 'rating')}}" method="get">
                <div class="form-group">
                    <button type="submit" class="btn-rounded w-25">
                        По рейтингу
                    </button>
                </div>
            </form>

            <form class="col-md-8" action="{{route('post.sort', 'date')}}" method="get">
                <div class="form-group">
                    <button type="submit" class="btn-rounded w-25">
                        По дате
                    </button>
                </div>
            </form>
        </div>

        @foreach ($posts as $post)
            <div class="container mt-5" id="post" style="border-bottom:3px solid; padding-bottom:10px;">
                <h3 class="card-header">{{$post->title}}</h3>
                <div class="card-header"> Автор: {{$post->user->name}} </div>
                <div class="card-header"> Рейтинг: {{$post->rating}} </div>
                <div class="card-header"> Дата публикации (создания): {{$post->created_at}} </div>
                <div class="mt-3"> {{$post->text}} </div>
{{--                <a href="{{route('commentary', $post->id)}}">--}}
{{--                    <input class="badge-pill" type="button" name="btn1" value="Добавить комментарий" style="margin-top:10px; margin-left:85%">--}}
{{--                </a>--}}
                @unless($post->tags->isEmpty())
                <div class="form-group">
                    Теги:
                    <ul>
                    @foreach($post->tags as $tag)
                            <li>
                             {{$tag->name}}
                            </li>
                    @endforeach
                    </ul>
                </div>
                @endunless
                <a href="{{route('post.show', $post->id)}}">
                    <input class="btn-primary" type="button" name="btn2" id="btn2" value="Читать полностью" style="margin-top:10px; margin-left:85%">
                </a>
                @if(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier()==$post->user_id)
                <a href="{{route('post.edit', $post->id)}}">
                    <input class="btn-primary" type="button" name="btn2" id="btn2" value="Редактировать" style="margin-top:10px; margin-left:85%">
                </a>
                @endif
{{--                <a href="{{route('rate',$post->id)}}">--}}
{{--                    <input type="button1" name="btn11" value="+" style="margin-top:10px; margin-left:85%">--}}
{{--                </a>--}}
            </div>
        @endforeach
    </div>
{{--    <div id="posts">--}}
{{--        <div style="border-bottom:3px solid">  --}}
{{--            <label for="posts" id="lab"> <h2>Посты:</h2></label> --}}
{{--        </div>--}}
{{--        @foreach ($posts as $post)--}}
{{--            <div class="post" id="post" style="border-bottom:3px solid; padding-bottom:10px;">--}}
{{--                <h3>{{$post->title}}</h3>--}}
{{--                <div class="text"> {{$post->text}} </div>--}}
{{--                <a href="{{route('paste', $post->)}}">--}}
{{--                    <input type="button" name="btn1" value="Открыть" style="margin-top:10px; margin-left:85%">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}

{{--    <script type="text/javascript">--}}
{{--        var size = 250;--}}
{{--        var pasteText;--}}
{{--        let paste = document.getElementsByClassName("postText");--}}
{{--        for(var i = 0; i<10; i++){--}}
{{--            pasteText = paste[i].textContent;--}}
{{--            if (paste[i].textContent.length > size){--}}
{{--                paste[i].textContent = pasteText.slice(0, size) + ' ...';--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
 <script type="text/javascript">
     var size = 512;
     var pasteText;
     let paste = document.getElementsByClassName("mt-3");
     for(var i = 0; i<10; i++){
         pasteText = paste[i].textContent;
         if (paste[i].textContent.length > size){
             paste[i].textContent = pasteText.slice(0, size) + ' ...';
         }
     }
 </script>
