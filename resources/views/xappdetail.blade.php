<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('/css/detail_style.css')}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="id_box" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{$post->title}}</h3>
                    <p>呪文：{{$post->spell}}</p>
                    <img src="{{$post->image}}">
                    <p>{{$post->body}}</p>
                    @if(Auth::user()->id == $post->user->id)<!--自分の投稿に対して -->
                                投稿主:<a href="/mylist/{{$post->user->id}}">{{$post->user->name}}</a>
                            @else<!--自分以外の投稿に対して-->
                                投稿主:<a href="/userprofile/{{$post->user->id}}">{{$post->user->name}}</a>
                            @endif
                    <!--<a href="/">戻る</a> -->
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
            <div class="comment_box">
                <div class="comment_box_container">
                    @if(Auth::user()->id == $post->user->id)
                    @else
                        <form action="/detail/{{$post->id}}/comment/store" method="POST">
                            @csrf
                            <input type="text" name="comment[body]" required>
                            <input type="hidden" name="comment[user_id]" value="{{Auth::user()->id}}" readonly>
                            <input type="hidden" name="comment[post_id]" value="{{$post->id}}" readonly>
                            <button type="submit">コメント</button>
                        </form>
                    @endif
                    <div class="comment_box_area">
                        @foreach($comments as $comment)
                            @if(Auth::user()->id == $comment->user_id)
                                <h1><a href="/mylist/{{$comment->user_id}}">{{$comment->user->name}}</a>：{{$comment->body}}</p>
                            @else
                                <h1><a href="/userprofile/{{$comment->user_id}}">{{$comment->user->name}}</a>：{{$comment->body}}</p>
                            @endif
                            <p>コメント時刻:{{(explode(" ",$comment->created_at))[0]}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>