<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("イラスト") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="/search">
                <input type="text" name="keyword" placeholder="イラスト検索" value="@if (isset($keyword)) {{$keyword}} @endif">
                <button type="submit">検索</button>
            </form>
            @foreach($posts as $post)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3>{{$post->title}}</h3>
                        <p>{{$post->body}}</p>
                        @if(Auth::user()->id == $post->user->id)<!--自分の投稿に対して -->
                            <a href="/mylist/{{$post->user->id}}">{{$post->user->name}}</a>
                        @else<!--自分以外の投稿に対して-->
                            <a href="/userprofile/{{$post->user->id}}">{{$post->user->name}}</a>
                        @endif
                        <p>{{$post->created_at}}</p>
                        <img src="{{$post->image}}">
                        <p>呪文：{{$post->spell}}</p>
                        <a href="/detail/{{$post->id}}">詳細(body部分を触ると詳細へ飛ぶようにしたい)</a>
                        @if(Auth::user()->is_likeing($post->id))<!-- その投稿をいいねしている場合 -->
                            <form action="/list/unlike/{{$post->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit">いいね解除</button>
                            </form>
                        @else
                            <form action="/list/dolike/{{$post->id}}" method="POST">
                                @csrf
                                <button type="submit">いいね</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>