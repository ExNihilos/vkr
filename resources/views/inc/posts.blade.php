 <div class="container" id="posts">
        <div style="border-bottom:3px solid">
            <label for="posts" id="lab"> <h3>Посты:</h3> </label>
        </div>
        @foreach ($posts as $post)
            <div class="container" id="post" style="border-bottom:3px solid; padding-bottom:10px;">
                <h3 class="card-header">{{$post->title}}</h3>
                <div class="card-header"> Автор: {{$post->user->name}} </div>
                <div class="card-header"> Рейтинг: {{$post->rating}} </div>
                <div class="mt-3"> {{$post->text}} </div>
{{--                <a href="{{route('commentary', $post->id)}}">--}}
{{--                    <input class="badge-pill" type="button" name="btn1" value="Добавить комментарий" style="margin-top:10px; margin-left:85%">--}}
{{--                </a>--}}
                <a href="{{route('detail', $post->id)}}">
                    <input class="btn-primary" type="button" name="btn2" id="btn2" value="Читать полностью" style="margin-top:10px; margin-left:85%">
                </a>
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
     var size = 250;
     var pasteText;
     let paste = document.getElementsByClassName("mt-3");
     for(var i = 0; i<10; i++){
         pasteText = paste[i].textContent;
         if (paste[i].textContent.length > size){
             paste[i].textContent = pasteText.slice(0, size) + ' ...';
         }
     }
 </script>
