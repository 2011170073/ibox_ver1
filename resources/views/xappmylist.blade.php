<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("プロフィール") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->body}}</p>
                        <img src="{{$post->image}}">
                        <p>呪文：{{$post->spell}}</p>
                        <a href="/detail/{{$post->id}}">詳細(body部分を触ると詳細へ飛ぶようにしたい)</a>
                        </br>
                        <a href="/mylist/edit/{{$post->id}}">編集</a>
                        </br>
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
</x-app-layout>

<script>
    function deletePost(id){
        "use strict"
        
        if(confirm("削除しますか？")){
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>




