<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{ asset('/css/userprofile_style.css')  }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>{{$user_id->name}}のプロフ</h1>
            @if(Auth::user()->is_following($user_id->id))<!-- そのユーザをフォローしている場合 -->
                <form action="/userlist/unfollow/{{$user_id->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit">フォロー解除</button>
                </form>
            @else
                <form action="/userlist/dofollow/{{$user_id->id}}" method="POST">
                    @csrf
                    <button type="submit">フォローする</button>
                </form>
            @endif
            <div id="id_flex1" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($posts as $post)
                    <div id="id_flex1_box" class="p-6 text-gray-900">
                        <a id="id_flex1_a" href="/detail/{{$post->id}}">
                            <div id=id_flex1_box_box1 style="background-image:url('{{$post->image}}')"></div>
                        </a>
                        <div id="id_flex1_box_box2">
                            @if(Auth::user()->id == $post->user->id)<!--自分の投稿に対して -->
                                <a href="/mylist/{{$post->user->id}}">{{$post->user->name}}</a>
                            @else<!--自分以外の投稿に対して-->
                                <a href="/userprofile/{{$post->user->id}}">{{$post->user->name}}</a>
                            @endif
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