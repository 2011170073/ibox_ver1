<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('/css/mylist_style.css')  }}" >
        <link rel="stylesheet" href="{{ asset('/css/icon_style.css')  }}" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("プロフィール") }}
        </h2>
        <script>
            if("{{isset(Auth::user()->id)}}" == true){//ログインしている時
                if("{{Auth::user()->id}}" == "{{$user_id}}"){// urlが「mylist/自身のユーザーid」の時
                }else{// urlが「mylist/他人のユーザーid」の時
                    window.location.replace("./{{Auth::user()->id}}");
                }
            }else{//ログインしていない時
                window.location.replace('./');
            }
        </script>
    </x-slot>
    <div class="py-12">
        <div id="id_icon_box">
            <div id="id_icon_box_box">
                <h2>アイコン</h2>
                @if(isset($user->icon))<!-- ユーザーがプロフィールアイコンを設定している場合 -->
                    <form action="/useprofile/{{$user_id}}/croppie/edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user[id]" value="{{$user_id}}" readonly>
                        <input type="file" name="user[icon]" accept="image/*" required>
                        <button type="submit">アイコン変更</button>
                    </form>
                @else
                    <form action="/useprofile/{{$user_id}}/croppie" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user[id]" value="{{$user_id}}" readonly>
                        <input type="file" name="user[icon]" accept="image/* require" required>
                        <button type="submit">アイコン設定</button>
                    </form>
                @endif
                <img id="id_icon" src="{{$user->icon}}">
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2>イラスト</h2>
            <div id="id_flex1" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($posts as $post)
                    <div id="id_flex1_box" class="p-6 text-gray-900">
                        <a id="id_flex1_a" href="/detail/{{$post->id}}">
                            <div id=id_flex1_box_box1 style="background-image:url('{{$post->image}}')"></div>
                        </a>
                        <div id="id_flex1_box_box2">
                            <p>{{$post->title}}</p>
                            <a href="/mylist/edit/{{$post->id}}">編集</a>
                            <form id="form_{{$post->id}}" action="/delete/{{$post->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="button" onclick="deletePost({{$post->id}})">削除</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function deletePost(id){
        "use strict"
        
        if(confirm("削除しますか？")){
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>