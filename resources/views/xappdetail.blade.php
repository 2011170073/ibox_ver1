<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->body}}</p>
                    <img src="{{$post->image}}">
                    <p>呪文：{{$post->spell}}</p>
                    <p>{{$post->user->name}}</p>
                    <p>{{$post->created_at}}</p>
                    <a href="/">戻る</a>
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
            <form action="/detail/{{$post->id}}/comment/store" method="POST">
                @csrf
                <input type="text" name="comment[body]">
                <input type="hidden" name="comment[user_id]" value="{{$post->user_id}}" readonly>
                <input type="hidden" name="comment[post_id]" value="{{$post->id}}" readonly>
                <button type="submit">コメント</button>
            </form>
            <div class="comment_area">
                @foreach($comments as $comment)
                    <p>{{$comment->user->name}}</p>
                    <p>{{$comment->body}}</p>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>